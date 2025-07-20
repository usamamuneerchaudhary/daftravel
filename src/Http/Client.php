<?php

namespace UsamamuneerChaudhary\Daftravel\Http;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use UsamamuneerChaudhary\Daftravel\Exceptions\AuthenticationException;
use UsamamuneerChaudhary\Daftravel\Exceptions\ValidationException;
use UsamamuneerChaudhary\Daftravel\Exceptions\RateLimitException;
use UsamamuneerChaudhary\Daftravel\Exceptions\ApiException;

class Client
{
    protected GuzzleClient $client;
    protected array $config;
    protected mixed $baseUrl;
    protected mixed $apiKey;

    public function __construct(array $config)
    {
        $this->config = $config;
        $this->baseUrl = $config['api_url'];
        $this->apiKey = $config['api_key'];

        $this->client = new GuzzleClient([
            'base_uri' => $this->baseUrl,
            'timeout' => $config['timeout'],
            'headers' => array_merge($config['default_headers'], [
                'Authorization' => 'Bearer ' . $this->apiKey,
            ]),
        ]);
    }

    /**
        * Send a GET request to the Daftra API.
     */
    public function get(string $endpoint, array $params = [])
    {
        $cacheKey = $this->getCacheKey('GET', $endpoint, $params);

        if ($this->isCacheEnabled() && Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $response = $this->makeRequest('GET', $endpoint, [
            'query' => $params,
        ]);

        if ($this->isCacheEnabled()) {
            Cache::put($cacheKey, $response, $this->config['cache']['ttl']);
        }

        return $response;
    }

    /**
     * Send a POST request to the Daftra API.
     */
    public function post(string $endpoint, array $data = [])
    {
        return $this->makeRequest('POST', $endpoint, [
            'json' => $data,
        ]);
    }

    /**
     * Send a PUT request to the Daftra API.
     */
    public function put(string $endpoint, array $data = [])
    {
        return $this->makeRequest('PUT', $endpoint, [
            'json' => $data,
        ]);
    }

    /**
     * Send a PATCH request to the Daftra API.
     */
    public function patch(string $endpoint, array $data = [])
    {
        return $this->makeRequest('PATCH', $endpoint, [
            'json' => $data,
        ]);
    }

    /**
     * Send a DELETE request to the Daftra API.
     */
    public function delete(string $endpoint)
    {
        return $this->makeRequest('DELETE', $endpoint);
    }

    /**
     * Make a request to the Daftra API with retry logic.
     */
    protected function makeRequest(string $method, string $endpoint, array $options = [])
    {
        $attempts = 0;
        $maxAttempts = $this->config['retry']['times'];

        while ($attempts < $maxAttempts) {
            try {
                $this->logRequest($method, $endpoint, $options);

                $response = $this->client->request($method, $endpoint, $options);
                $body = json_decode($response->getBody()->getContents(), true) ?? [];

                $this->logResponse($response->getStatusCode(), $body);

                return $body;
            } catch (RequestException $e) {
                $attempts++;

                if ($e->hasResponse()) {
                    $statusCode = $e->getResponse()->getStatusCode();
                    $responseBody = json_decode($e->getResponse()->getBody()->getContents(), true) ?? [];

                    $this->logError($method, $endpoint, $statusCode, $responseBody);

                    if ($attempts >= $maxAttempts) {
                        $this->handleError($statusCode, $responseBody, $e);
                    }
                } else {
                    if ($attempts >= $maxAttempts) {
                        throw new ApiException('Network error: ' . $e->getMessage(), 0, $e);
                    }
                }

                if ($attempts < $maxAttempts) {
                    usleep($this->config['retry']['delay'] * 1000);
                }
            }
        }
    }

    /**
     * Handle errors based on the status code and response body.
     */
    protected function handleError(int $statusCode, array $responseBody, RequestException $e)
    {
        $message = $responseBody['message'] ?? 'An error occurred';

        switch ($statusCode) {
            case 401:
                throw new AuthenticationException($message, $statusCode, $e, $responseBody, $statusCode);
            case 422:
                $errors = $responseBody['errors'] ?? [];
                throw new ValidationException($message, $errors, $statusCode, $e, $responseBody, $statusCode);
            case 429:
                $retryAfter = $e->getResponse()->getHeaderLine('Retry-After');
                throw new RateLimitException($message, $retryAfter, $statusCode, $e, $responseBody, $statusCode);
            default:
                throw new ApiException($message, $statusCode, $e, $responseBody, $statusCode);
        }
    }

    /**
     * Generate a cache key based on the request method, endpoint, and parameters.
     */
    protected function getCacheKey(string $method, string $endpoint, array $params = []): string
    {
        $key = $method . ':' . $endpoint . ':' . md5(json_encode($params));
        return $this->config['cache']['prefix'] . $key;
    }

    /**
     * Check if caching is enabled and the request method is cacheable.
     */
    protected function isCacheEnabled(): bool
    {
        return $this->config['cache']['enabled'] && in_array(request()->method(), ['GET']);
    }

    /**
     * Log the request details.
     */
    protected function logRequest(string $method, string $endpoint, array $options)
    {
        if ($this->config['logging']['enabled']) {
            Log::log($this->config['logging']['level'], "Daftra API Request: {$method} {$endpoint}", [
                'options' => $options,
            ]);
        }
    }

    /**
     * Log the response details.
     */
    protected function logResponse(int $statusCode, array $body)
    {
        if ($this->config['logging']['enabled']) {
            Log::log($this->config['logging']['level'], "Daftra API Response: {$statusCode}", [
                'body' => $body,
            ]);
        }
    }

    /**
     * Log error details.
     */
    protected function logError(string $method, string $endpoint, int $statusCode, array $body)
    {
        if ($this->config['logging']['enabled']) {
            Log::error("Daftra API Error: {$method} {$endpoint} - {$statusCode}", [
                'body' => $body,
            ]);
        }
    }
}

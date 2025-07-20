<?php

namespace UsamamuneerChaudhary\Daftravel\Tests\Unit;

use UsamamuneerChaudhary\Daftravel\Tests\TestCase;
use UsamamuneerChaudhary\Daftravel\Http\Client;
use UsamamuneerChaudhary\Daftravel\Exceptions\AuthenticationException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Mockery;

class ClientTest extends TestCase
{
    protected $config;
    protected $client;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->config = [
            'api_url' => 'https://api.daftra.com/v2',
            'api_key' => 'test-api-key',
            'timeout' => 30,
            'retry' => [
                'times' => 3,
                'delay' => 1000,
            ],
            'cache' => [
                'enabled' => false,
                'ttl' => 3600,
                'prefix' => 'daftra_',
            ],
            'logging' => [
                'enabled' => false,
                'level' => 'info',
            ],
            'default_headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ];
    }

    public function testClientCanMakeGetRequest()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(['data' => 'test'])),
        ]);
        
        $handlerStack = HandlerStack::create($mock);
        $client = new Client($this->config);
        
        $reflection = new \ReflectionClass($client);
        $clientProperty = $reflection->getProperty('client');
        $clientProperty->setAccessible(true);
        $guzzleClient = $clientProperty->getValue($client);
        
        // Create a new Guzzle client with the mock handler
        $newGuzzleClient = new \GuzzleHttp\Client([
            'base_uri' => $this->config['api_url'],
            'timeout' => $this->config['timeout'],
            'headers' => array_merge($this->config['default_headers'], [
                'Authorization' => 'Bearer ' . $this->config['api_key'],
            ]),
            'handler' => $handlerStack,
        ]);
        
        $clientProperty->setValue($client, $newGuzzleClient);
        
        $result = $client->get('/test');
        
        $this->assertEquals(['data' => 'test'], $result);
    }

    public function testClientCanMakePostRequest()
    {
        $mock = new MockHandler([
            new Response(201, [], json_encode(['created' => true])),
        ]);
        
        $handlerStack = HandlerStack::create($mock);
        $client = new Client($this->config);
        
        $reflection = new \ReflectionClass($client);
        $clientProperty = $reflection->getProperty('client');
        $clientProperty->setAccessible(true);
        
        // Create a new Guzzle client with the mock handler
        $newGuzzleClient = new \GuzzleHttp\Client([
            'base_uri' => $this->config['api_url'],
            'timeout' => $this->config['timeout'],
            'headers' => array_merge($this->config['default_headers'], [
                'Authorization' => 'Bearer ' . $this->config['api_key'],
            ]),
            'handler' => $handlerStack,
        ]);
        
        $clientProperty->setValue($client, $newGuzzleClient);
        
        $result = $client->post('/test', ['name' => 'test']);
        
        $this->assertEquals(['created' => true], $result);
    }

    public function testClientThrowsAuthenticationExceptionOn401()
    {
        $this->expectException(AuthenticationException::class);
        
        $mock = new MockHandler([
            new RequestException(
                'Unauthorized',
                new Request('GET', '/test'),
                new Response(401, [], json_encode(['message' => 'Unauthorized']))
            ),
        ]);
        
        $handlerStack = HandlerStack::create($mock);
        
        // Create config with no retries for this test
        $testConfig = $this->config;
        $testConfig['retry']['times'] = 1;
        
        $client = new Client($testConfig);
        
        $reflection = new \ReflectionClass($client);
        $clientProperty = $reflection->getProperty('client');
        $clientProperty->setAccessible(true);
        
        // Create a new Guzzle client with the mock handler
        $newGuzzleClient = new \GuzzleHttp\Client([
            'base_uri' => $testConfig['api_url'],
            'timeout' => $testConfig['timeout'],
            'headers' => array_merge($testConfig['default_headers'], [
                'Authorization' => 'Bearer ' . $testConfig['api_key'],
            ]),
            'handler' => $handlerStack,
        ]);
        
        $clientProperty->setValue($client, $newGuzzleClient);
        
        $client->get('/test');
    }

    public function testClientRetriesFailedRequests()
    {
        $mock = new MockHandler([
            new RequestException(
                'Server Error',
                new Request('GET', '/test'),
                new Response(500, [], json_encode(['message' => 'Server Error']))
            ),
            new RequestException(
                'Server Error',
                new Request('GET', '/test'),
                new Response(500, [], json_encode(['message' => 'Server Error']))
            ),
            new Response(200, [], json_encode(['data' => 'success'])),
        ]);
        
        $handlerStack = HandlerStack::create($mock);
        $client = new Client($this->config);
        
        $reflection = new \ReflectionClass($client);
        $clientProperty = $reflection->getProperty('client');
        $clientProperty->setAccessible(true);
        
        // Create a new Guzzle client with the mock handler
        $newGuzzleClient = new \GuzzleHttp\Client([
            'base_uri' => $this->config['api_url'],
            'timeout' => $this->config['timeout'],
            'headers' => array_merge($this->config['default_headers'], [
                'Authorization' => 'Bearer ' . $this->config['api_key'],
            ]),
            'handler' => $handlerStack,
        ]);
        
        $clientProperty->setValue($client, $newGuzzleClient);
        
        $result = $client->get('/test');
        
        $this->assertEquals(['data' => 'success'], $result);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
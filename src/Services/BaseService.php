<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

use UsamamuneerChaudhary\Daftravel\Http\Client;

abstract class BaseService
{
    protected Client $client;
    protected array $config;
    protected ?string $endpoint;

    public function __construct(Client $client, array $config)
    {
        $this->client = $client;
        $this->config = $config;
    }

    public function all(array $params = [])
    {
        return $this->client->get($this->endpoint . '.json', $params);
    }

    public function find(int $id)
    {
        return $this->client->get("{$this->endpoint}/{$id}.json");
    }

    public function create(array $data)
    {
        return $this->client->post($this->endpoint, $data);
    }

    public function update(int $id, array $data)
    {
        return $this->client->put("{$this->endpoint}/{$id}", $data);
    }

    public function delete(int $id)
    {
        return $this->client->delete("{$this->endpoint}/{$id}");
    }

    public function paginate(int $page = 1, int $limit = 20, array $params = [])
    {
        // Validate parameters according to Daftra API documentation
        $page = max(1, $page); // page >= 1
        $limit = max(1, min(1000, $limit)); // limit between 1 and 1000

        $params['page'] = $page;
        $params['limit'] = $limit;

        return $this->client->get($this->endpoint . '.json', $params);
    }
}

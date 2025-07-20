<?php

namespace UsamamuneerChaudhary\Daftravel\Tests\Feature;

use UsamamuneerChaudhary\Daftravel\Tests\TestCase;
use UsamamuneerChaudhary\Daftravel\Daftravel;
use UsamamuneerChaudhary\Daftravel\Services\StoreService;
use Mockery;

class StoreServiceTest extends TestCase
{
    protected $daftravel;
    protected $storeService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->daftravel = app('daftravel');
        $this->storeService = $this->daftravel->stores();
    }

    public function testStoreServiceExists()
    {
        $this->assertInstanceOf(StoreService::class, $this->storeService);
    }

    public function testCanGetAllStores()
    {
        $client = Mockery::mock($this->daftravel->getClient());
        $client->shouldReceive('get')
            ->with('/stores.json', [])
            ->andReturn(['data' => ['stores' => []]]);

        $this->setMockClient($client);

        $result = $this->storeService->all();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
    }

    public function testCanFindStore()
    {
        $client = Mockery::mock($this->daftravel->getClient());
        $client->shouldReceive('get')
            ->with('/stores/1.json')
            ->andReturn(['data' => ['id' => 1, 'name' => 'Main Warehouse']]);

        $this->setMockClient($client);

        $result = $this->storeService->find(1);

        $this->assertIsArray($result);
        $this->assertEquals(1, $result['data']['id']);
    }

    public function testCanCreateStore()
    {
        $storeData = [
            'name' => 'Main Warehouse',
            'address' => '123 Warehouse St',
            'city' => 'New York',
            'state' => 'NY',
            'zip_code' => '10001',
            'country' => 'USA',
            'phone' => '+1-555-123-4567',
            'email' => 'warehouse@company.com',
            'status' => 'active'
        ];

        $client = Mockery::mock($this->daftravel->getClient());
        $client->shouldReceive('post')
            ->with('/stores', $storeData)
            ->andReturn(['data' => array_merge($storeData, ['id' => 1])]);

        $this->setMockClient($client);

        $result = $this->storeService->create($storeData);

        $this->assertIsArray($result);
        $this->assertEquals(1, $result['data']['id']);
    }

    public function testCanUpdateStore()
    {
        $storeData = [
            'name' => 'Updated Warehouse',
            'phone' => '+1-555-987-6543'
        ];

        $client = Mockery::mock($this->daftravel->getClient());
        $client->shouldReceive('put')
            ->with('/stores/1', $storeData)
            ->andReturn(['data' => array_merge($storeData, ['id' => 1])]);

        $this->setMockClient($client);

        $result = $this->storeService->update(1, $storeData);

        $this->assertIsArray($result);
        $this->assertEquals(1, $result['data']['id']);
    }

    public function testCanDeleteStore()
    {
        $client = Mockery::mock($this->daftravel->getClient());
        $client->shouldReceive('delete')
            ->with('/stores/1')
            ->andReturn(['message' => 'Store deleted']);

        $this->setMockClient($client);

        $result = $this->storeService->delete(1);

        $this->assertIsArray($result);
        $this->assertEquals('Store deleted', $result['message']);
    }

    protected function setMockClient($client)
    {
        $reflection = new \ReflectionClass($this->storeService);
        $clientProperty = $reflection->getProperty('client');
        $clientProperty->setAccessible(true);
        $clientProperty->setValue($this->storeService, $client);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}

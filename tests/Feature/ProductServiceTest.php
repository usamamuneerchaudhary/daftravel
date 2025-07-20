<?php

namespace UsamamuneerChaudhary\Daftravel\Tests\Feature;

use UsamamuneerChaudhary\Daftravel\Tests\TestCase;
use UsamamuneerChaudhary\Daftravel\Daftravel;
use UsamamuneerChaudhary\Daftravel\Services\ProductService;
use Mockery;

class ProductServiceTest extends TestCase
{
    protected $daftravel;
    protected $productService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->daftravel = app('daftravel');
        $this->productService = $this->daftravel->products();
    }

    public function testProductServiceExists()
    {
        $this->assertInstanceOf(ProductService::class, $this->productService);
    }

    public function testCanGetAllProducts()
    {
        $client = Mockery::mock($this->daftravel->getClient());
        $client->shouldReceive('get')
            ->with('/products.json', [])
            ->andReturn(['data' => ['products' => []]]);

        $this->setMockClient($client);

        $result = $this->productService->all();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
    }

    public function testCanFindProductById()
    {
        $client = Mockery::mock($this->daftravel->getClient());
        $client->shouldReceive('get')
            ->with('/products/1.json')
            ->andReturn(['data' => ['id' => 1, 'name' => 'Test Product']]);

        $this->setMockClient($client);

        $result = $this->productService->find(1);

        $this->assertIsArray($result);
        $this->assertEquals(1, $result['data']['id']);
    }

    public function testCanCreateProduct()
    {
        $productData = [
            'name' => 'New Product',
            'price' => 99.99,
            'stock' => 10,
        ];

        $client = Mockery::mock($this->daftravel->getClient());
        $client->shouldReceive('post')
            ->with('/products', $productData)
            ->andReturn(['data' => array_merge($productData, ['id' => 1])]);

        $this->setMockClient($client);

        $result = $this->productService->create($productData);

        $this->assertIsArray($result);
        $this->assertEquals(1, $result['data']['id']);
        $this->assertEquals('New Product', $result['data']['name']);
    }

    public function testCanUpdateProduct()
    {
        $productData = [
            'name' => 'Updated Product',
            'price' => 149.99,
        ];

        $client = Mockery::mock($this->daftravel->getClient());
        $client->shouldReceive('put')
            ->with('/products/1', $productData)
            ->andReturn(['data' => array_merge($productData, ['id' => 1])]);

        $this->setMockClient($client);

        $result = $this->productService->update(1, $productData);

        $this->assertIsArray($result);
        $this->assertEquals(1, $result['data']['id']);
        $this->assertEquals('Updated Product', $result['data']['name']);
    }

    public function testCanDeleteProduct()
    {
        $client = Mockery::mock($this->daftravel->getClient());
        $client->shouldReceive('delete')
            ->with('/products/1')
            ->andReturn(['message' => 'Product deleted']);

        $this->setMockClient($client);

        $result = $this->productService->delete(1);

        $this->assertIsArray($result);
        $this->assertEquals('Product deleted', $result['message']);
    }

    protected function setMockClient($client)
    {
        $reflection = new \ReflectionClass($this->productService);
        $clientProperty = $reflection->getProperty('client');
        $clientProperty->setAccessible(true);
        $clientProperty->setValue($this->productService, $client);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}

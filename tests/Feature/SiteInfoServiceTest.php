<?php

namespace UsamamuneerChaudhary\Daftravel\Tests\Feature;

use UsamamuneerChaudhary\Daftravel\Tests\TestCase;
use UsamamuneerChaudhary\Daftravel\Daftravel;
use UsamamuneerChaudhary\Daftravel\Services\SiteInfoService;
use Mockery;

class SiteInfoServiceTest extends TestCase
{
    protected $daftravel;
    protected $siteInfoService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->daftravel = app('daftravel');
        $this->siteInfoService = $this->daftravel->siteInfo();
    }

    public function testSiteInfoServiceExists()
    {
        $this->assertInstanceOf(SiteInfoService::class, $this->siteInfoService);
    }

    public function testCanGetAllSiteInfo()
    {
        $client = Mockery::mock($this->daftravel->getClient());
        $client->shouldReceive('get')
            ->with('/site_info.json', [])
            ->andReturn(['data' => ['company_name' => 'Test Company']]);

        $this->setMockClient($client);

        $result = $this->siteInfoService->all();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
    }

    public function testCanFindSiteInfo()
    {
        $client = Mockery::mock($this->daftravel->getClient());
        $client->shouldReceive('get')
            ->with('/site_info/1.json')
            ->andReturn(['data' => ['id' => 1, 'company_name' => 'Test Company', 'address' => '123 Test St']]);

        $this->setMockClient($client);

        $result = $this->siteInfoService->find(1);

        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
        $this->assertEquals('Test Company', $result['data']['company_name']);
    }

    public function testCanGetSiteInfoWithCustomParameters()
    {
        $client = Mockery::mock($this->daftravel->getClient());
        $client->shouldReceive('get')
            ->with('/site_info.json', ['limit' => 10])
            ->andReturn(['data' => ['version' => '2.0.0', 'api_version' => 'v2']]);

        $this->setMockClient($client);

        $result = $this->siteInfoService->all(['limit' => 10]);

        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
        $this->assertEquals('2.0.0', $result['data']['version']);
    }

    protected function setMockClient($client)
    {
        $reflection = new \ReflectionClass($this->siteInfoService);
        $clientProperty = $reflection->getProperty('client');
        $clientProperty->setAccessible(true);
        $clientProperty->setValue($this->siteInfoService, $client);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
} 
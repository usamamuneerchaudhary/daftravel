<?php

namespace UsamamuneerChaudhary\Daftravel\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use UsamamuneerChaudhary\Daftravel\DaftravelServiceProvider;

class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            DaftravelServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Daftravel' => \UsamamuneerChaudhary\Daftravel\Facades\Daftravel::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('daftravel.api_key', 'test-api-key');
        $app['config']->set('daftravel.api_url', 'https://api.daftra.com/v2');
        $app['config']->set('daftravel.timeout', 30);
    }
}
<?php

namespace UsamamuneerChaudhary\Daftravel;

use Illuminate\Support\ServiceProvider;

class DaftravelServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/daftravel.php', 'daftravel');

        $this->app->singleton('daftravel', function ($app) {
            return new Daftravel($app['config']['daftravel']);
        });

        $this->app->alias('daftravel', Daftravel::class);
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/daftravel.php' => config_path('daftravel.php'),
            ], 'daftravel-config');
        }
    }

    public function provides(): array
    {
        return ['daftravel'];
    }
}

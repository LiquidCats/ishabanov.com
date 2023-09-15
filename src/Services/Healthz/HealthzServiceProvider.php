<?php

namespace App\Healthz;

use Illuminate\Support\ServiceProvider;
use App\Healthz\Providers\RouteServiceProvider;

class HealthzServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);
    }
}

<?php

namespace App\Healthz;

use App\Healthz\Providers\RouteServiceProvider;
use Illuminate\Support\ServiceProvider;

class HealthzServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);
    }
}

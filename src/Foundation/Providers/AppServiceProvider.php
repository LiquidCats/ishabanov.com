<?php

declare(strict_types=1);

namespace App\Foundation\Providers;

use App\Admin\AdminServiceProvider;
use App\Api\ApiServiceProvider;
use App\Healthz\HealthzServiceProvider;
use App\Pages\PagesServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(AdminServiceProvider::class);
        $this->app->register(ApiServiceProvider::class);
        $this->app->register(PagesServiceProvider::class);
        $this->app->register(HealthzServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}

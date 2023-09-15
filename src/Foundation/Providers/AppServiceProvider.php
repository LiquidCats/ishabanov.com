<?php

declare(strict_types=1);

namespace ishabanov\Foundation\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use ishabanov\Admin\AdminServiceProvider;
use ishabanov\Api\ApiServiceProvider;
use ishabanov\Pages\PagesServiceProvider;

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

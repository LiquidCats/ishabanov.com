<?php

declare(strict_types=1);

namespace ishabanov\Core\Infrastructure\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use ishabanov\Admin\ApplicationServiceProvider as AdminServiceProvider;
use ishabanov\Api\ApplicationServiceProvider as ApiServiceProvider;
use ishabanov\Pages\ApplicationServiceProvider as PagesServiceProvider;

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
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}

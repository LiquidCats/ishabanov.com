<?php

declare(strict_types=1);

namespace App\Foundation\Providers;

use App\Admin\AdminServiceProvider;
use App\Authz\AuthzServiceProvider;
use App\Domains\Blocks\BlocksDomainProvider;
use App\Domains\Blog\BlogDomainProvider;
use App\Domains\Files\FileDomainProvider;
use App\Domains\User\UserDomainProvider;
use App\Foundation\Context\Context;
use App\Foundation\Context\ContextProvider;
use App\Foundation\Context\Resolvers\FromRequestValueResolver;
use App\Foundation\Context\Resolvers\FromRouteValueResolver;
use App\Foundation\Context\Resolvers\ResolverPool;
use App\Foundation\Context\ValueResolver;
use App\Front\FrontServiceProvider;
use App\Healthz\HealthzServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Context
        $this->app->singleton(ValueResolver::class, fn () => new ResolverPool(
            $this->app->make(FromRequestValueResolver::class),
            $this->app->make(FromRouteValueResolver::class),
        ));

        $this->app->singleton(Context::class, ContextProvider::class);

        // Domains
        $this->app->register(UserDomainProvider::class);
        $this->app->register(BlogDomainProvider::class);
        $this->app->register(FileDomainProvider::class);
        $this->app->register(BlocksDomainProvider::class);

        // Services
        $this->app->register(AuthzServiceProvider::class);
        $this->app->register(AdminServiceProvider::class);
        $this->app->register(FrontServiceProvider::class);
        $this->app->register(HealthzServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::useBuildDirectory('static');
        if ($this->app->environment('production', 'staging')) {
            URL::forceScheme('https');
        }
    }
}

<?php

namespace App\Admin;

use App\Admin\Provides\RouteServiceProvider;
use App\Domains\Blog\Contracts\Services\PostServiceContract;
use App\Domains\Blog\Contracts\Services\TagServiceContract;
use App\Domains\Blog\Services\PostService;
use App\Domains\Blog\Services\TagService;
use Carbon\Laravel\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->singleton(PostServiceContract::class, PostService::class);
        $this->app->singleton(TagServiceContract::class, TagService::class);
    }

    public function boot(): void
    {
    }
}

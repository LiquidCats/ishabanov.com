<?php

declare(strict_types=1);

namespace App\Domains\Blog;

use App\Domains\Blog\Contracts\Services\PostServiceContract;
use App\Domains\Blog\Contracts\Services\TagServiceContract;
use App\Domains\Blog\Services\PostService;
use App\Domains\Blog\Services\TagService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class BlogDomainProvider extends ServiceProvider
{
    public function boot(): void
    {
        Route::pattern('post_id', '[0-9]{1,32}');
        Route::pattern('tag_id', '[0-9]{1,32}');
        Route::pattern('tag_slug', '[a-z0-9\-]{1,255}');
    }

    public function register(): void
    {
        $this->app->singleton(PostServiceContract::class, PostService::class);
        $this->app->singleton(TagServiceContract::class, TagService::class);
    }
}

<?php

declare(strict_types=1);

namespace App\Domains\Blog;

use App\Admin\Application\Services\PostService;
use App\Admin\Application\Services\TagService;
use App\Data\Database\Eloquent\Models\Post;
use App\Data\Database\Eloquent\Models\Tag;
use App\Domains\Blog\Contracts\Repositories\PostRepositoryContract;
use App\Domains\Blog\Contracts\Repositories\TagRepositoryContract;
use App\Domains\Blog\Contracts\Services\PostServiceContract;
use App\Domains\Blog\Contracts\Services\TagServiceContract;
use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(PostRepositoryContract::class, Post::class);
        $this->app->singleton(TagRepositoryContract::class, Tag::class);
        $this->app->singleton(PostServiceContract::class, PostService::class);
        $this->app->singleton(TagServiceContract::class, TagService::class);
    }
}

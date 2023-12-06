<?php

declare(strict_types=1);

namespace App\Domains\Blog;

use App\Data\Database\Eloquent\Models\ExperienceModel;
use App\Data\Database\Eloquent\Models\PostModel;
use App\Data\Database\Eloquent\Models\TagModel;
use App\Domains\Blog\Contracts\Repositories\ExperienceRepositoryContract;
use App\Domains\Blog\Contracts\Repositories\PostRepositoryContract;
use App\Domains\Blog\Contracts\Repositories\TagRepositoryContract;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class BlogDomainProvider extends ServiceProvider
{
    public function boot(): void
    {
        Route::pattern('post_id', '[0-9]+');
        Route::pattern('tag_id', '[0-9]+');
        Route::pattern('tag_slug', '[a-z0-9\-]+');
    }

    public function register(): void
    {
        $this->app->singleton(PostRepositoryContract::class, PostModel::class);
        $this->app->singleton(TagRepositoryContract::class, TagModel::class);
        $this->app->singleton(ExperienceRepositoryContract::class, ExperienceModel::class);
    }
}

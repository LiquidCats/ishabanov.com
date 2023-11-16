<?php

declare(strict_types=1);

namespace App\Domains\Blog;

use App\Data\Database\Eloquent\Models\ExperienceModel;
use App\Data\Database\Eloquent\Models\PostModel;
use App\Data\Database\Eloquent\Models\TagModel;
use App\Domains\Blog\Contracts\Repositories\ExperienceRepositoryContract;
use App\Domains\Blog\Contracts\Repositories\PostRepositoryContract;
use App\Domains\Blog\Contracts\Repositories\TagRepositoryContract;
use Illuminate\Support\ServiceProvider;

class BlogDomainProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(PostRepositoryContract::class, PostModel::class);
        $this->app->singleton(TagRepositoryContract::class, TagModel::class);
        $this->app->singleton(ExperienceRepositoryContract::class, ExperienceModel::class);
    }
}

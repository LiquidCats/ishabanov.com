<?php

namespace App\Admin;

use App\Admin\Application\Services\BlogService;
use App\Admin\Application\Services\DashboardViewService;
use App\Admin\Application\Services\PostCreateViewService;
use App\Admin\Application\Services\PostEditViewService;
use App\Admin\Application\Services\PostListViewService;
use App\Admin\Presentation\Http\Controllers\DashboardController;
use App\Admin\Presentation\Http\Controllers\PostCreateController;
use App\Admin\Presentation\Http\Controllers\PostEditController;
use App\Admin\Presentation\Http\Controllers\PostListController;
use App\Admin\Provides\RouteServiceProvider;
use App\Data\Database\Eloquent\Repositories\PostRepository;
use App\Data\Database\Eloquent\Repositories\TagRepository;
use App\Domains\Blog\Contracts\Repositories\PostRepositoryContract;
use App\Domains\Blog\Contracts\Repositories\TagRepositoryContract;
use App\Domains\Blog\Contracts\Services\BlogServiceContract;
use App\Domains\Kernel\Contracts\Services\PageComposerServiceContract;
use Carbon\Laravel\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->singleton(PostRepositoryContract::class, PostRepository::class);
        $this->app->singleton(TagRepositoryContract::class, TagRepository::class);

        $this->app->singleton(BlogServiceContract::class, BlogService::class);

        $this->app->when(DashboardController::class)
            ->needs(PageComposerServiceContract::class)
            ->give(DashboardViewService::class);

        $this->app->when(PostListController::class)
            ->needs(PageComposerServiceContract::class)
            ->give(PostListViewService::class);

        $this->app->when(PostCreateController::class)
            ->needs(PageComposerServiceContract::class)
            ->give(PostCreateViewService::class);

        $this->app->when(PostEditController::class)
            ->needs(PageComposerServiceContract::class)
            ->give(PostEditViewService::class);
    }
}

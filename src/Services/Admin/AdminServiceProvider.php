<?php

namespace App\Admin;

use App\Admin\Application\Services\DashboardViewService;
use App\Admin\Application\Services\FileCreateViewService;
use App\Admin\Application\Services\FilesListViewService;
use App\Admin\Application\Services\PostCreateViewService;
use App\Admin\Application\Services\PostEditViewService;
use App\Admin\Application\Services\PostListViewService;
use App\Admin\Application\Services\TagCreateViewService;
use App\Admin\Application\Services\TagEditViewService;
use App\Admin\Application\Services\TagListViewService;
use App\Admin\Presentation\Http\Controllers\DashboardController;
use App\Admin\Presentation\Http\Controllers\Files\FilesCreateController;
use App\Admin\Presentation\Http\Controllers\Files\FilesListController;
use App\Admin\Presentation\Http\Controllers\Posts\PostCreateController;
use App\Admin\Presentation\Http\Controllers\Posts\PostEditController;
use App\Admin\Presentation\Http\Controllers\Posts\PostListController;
use App\Admin\Presentation\Http\Controllers\Tags\TagCreateController;
use App\Admin\Presentation\Http\Controllers\Tags\TagEditController;
use App\Admin\Presentation\Http\Controllers\Tags\TagListController;
use App\Admin\Presentation\Http\Views\Components\Sidebar;
use App\Admin\Presentation\Http\Views\Components\SidebarLink;
use App\Admin\Provides\RouteServiceProvider;
use App\Domains\Blog\BlogServiceProvider;
use App\Domains\Files\FileServiceProvider;
use App\Domains\Kernel\Contracts\Services\PageComposerServiceContract;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AdminServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(BlogServiceProvider::class);
        $this->app->register(FileServiceProvider::class);

        $this->app->when(DashboardController::class)
            ->needs(PageComposerServiceContract::class)
            ->give(DashboardViewService::class);

        // POST
        $this->app->when(PostListController::class)
            ->needs(PageComposerServiceContract::class)
            ->give(PostListViewService::class);

        $this->app->when(PostCreateController::class)
            ->needs(PageComposerServiceContract::class)
            ->give(PostCreateViewService::class);

        $this->app->when(PostEditController::class)
            ->needs(PageComposerServiceContract::class)
            ->give(PostEditViewService::class);

        // FILE
        $this->app->when(FilesCreateController::class)
            ->needs(PageComposerServiceContract::class)
            ->give(FileCreateViewService::class);
        $this->app->when(FilesListController::class)
            ->needs(PageComposerServiceContract::class)
            ->give(FilesListViewService::class);

        // TAG
        $this->app->when(TagEditController::class)
            ->needs(PageComposerServiceContract::class)
            ->give(TagEditViewService::class);
        $this->app->when(TagCreateController::class)
            ->needs(PageComposerServiceContract::class)
            ->give(TagCreateViewService::class);
        $this->app->when(TagListController::class)
            ->needs(PageComposerServiceContract::class)
            ->give(TagListViewService::class);
    }

    public function boot(): void
    {
        Blade::component(Sidebar::class, 'sidebar', 'admin');
        Blade::component(SidebarLink::class, 'sidebar-link', 'admin');
    }
}

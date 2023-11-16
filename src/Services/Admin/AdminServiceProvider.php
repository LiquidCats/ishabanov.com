<?php

namespace App\Admin;

use App\Admin\Application\Services\PostService;
use App\Admin\Application\Services\TagService;
use App\Admin\Presentation\Http\Views\Components\Sidebar;
use App\Admin\Presentation\Http\Views\Components\SidebarLink;
use App\Admin\Provides\RouteServiceProvider;
use App\Domains\Blog\Contracts\Services\PostServiceContract;
use App\Domains\Blog\Contracts\Services\TagServiceContract;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::component(Sidebar::class, 'sidebar', 'admin');
        Blade::component(SidebarLink::class, 'sidebar-link', 'admin');
    }
}

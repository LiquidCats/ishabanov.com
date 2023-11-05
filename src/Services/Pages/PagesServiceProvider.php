<?php

namespace App\Pages;

use App\Domains\Blog\BlogServiceProvider;
use App\Domains\Homepage\HomepageServiceProvider;
use App\Domains\Kernel\Contracts\Services\PageComposerServiceContract;
use App\Pages\Application\Services\AboutService;
use App\Pages\Application\Services\BlogService;
use App\Pages\Application\Services\HomepageService;
use App\Pages\Application\Services\PostService;
use App\Pages\Presentation\Http\Controllers\AboutController;
use App\Pages\Presentation\Http\Controllers\BlogController;
use App\Pages\Presentation\Http\Controllers\HomepageController;
use App\Pages\Presentation\Http\Controllers\PostController;
use App\Pages\Presentation\Http\Views\Components\Navbar;
use App\Pages\Presentation\Http\Views\Components\Tag;
use App\Pages\Provides\RouteServiceProvider;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class PagesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(BlogServiceProvider::class);
        $this->app->register(HomepageServiceProvider::class);
        //
        $this->app->when(HomepageController::class)
            ->needs(PageComposerServiceContract::class)
            ->give(HomepageService::class);
        $this->app->when(BlogController::class)
            ->needs(PageComposerServiceContract::class)
            ->give(BlogService::class);
        $this->app->when(PostController::class)
            ->needs(PageComposerServiceContract::class)
            ->give(PostService::class);
        $this->app->when(AboutController::class)
            ->needs(PageComposerServiceContract::class)
            ->give(AboutService::class);
    }

    public function boot(): void
    {
        Blade::component(Navbar::class, 'navbar');
        Blade::component(Tag::class, 'tag');
        Blade::componentNamespace('App\\Pages\\Presentation\\Http\\Views\\Components\\Posts', 'posts');
    }
}

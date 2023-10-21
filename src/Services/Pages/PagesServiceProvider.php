<?php

namespace App\Pages;

use App\Data\Database\Eloquent\Repositories\ExperienceRepository;
use App\Data\Database\Eloquent\Repositories\PostRepository;
use App\Domains\Blog\Contracts\Repositories\PostRepositoryContract;
use App\Domains\Homepage\Contracts\Repositories\ExperienceRepositoryContract;
use App\Domains\Kernel\Contracts\Services\PageComposerServiceContract;
use App\Pages\Application\Services\BlogService;
use App\Pages\Application\Services\HomepageService;
use App\Pages\Presentation\Http\Controllers\BlogController;
use App\Pages\Presentation\Http\Controllers\HomepageController;
use App\Pages\Presentation\Http\Views\Components\Navbar;
use App\Pages\Presentation\Http\Views\Components\Posts\PrevNext;
use App\Pages\Presentation\Http\Views\Components\Tag;
use App\Pages\Provides\RouteServiceProvider;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class PagesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);
        //
        $this->app->when(HomepageController::class)
            ->needs(PageComposerServiceContract::class)
            ->give(HomepageService::class);
        $this->app->when(BlogController::class)
            ->needs(PageComposerServiceContract::class)
            ->give(BlogService::class);
        $this->app->singleton(ExperienceRepositoryContract::class, ExperienceRepository::class);
        $this->app->singleton(PostRepositoryContract::class, PostRepository::class);
    }

    public function boot(): void
    {
        Blade::component('navbar', Navbar::class);
        Blade::component('tag', Tag::class);
        Blade::componentNamespace('App\\Pages\\Presentation\\Http\\Views\\Components\\Posts', 'posts');
    }
}

<?php

namespace App\Pages;

use Carbon\Laravel\ServiceProvider;
use App\Data\Database\Eloquent\Repositories\ExperienceRepository;
use App\Domains\Homepage\Contracts\Repositories\ExperienceRepositoryContract;
use App\Domains\Kernel\Contracts\Services\PageComposerServiceContract;
use App\Pages\Application\Services\HomepageService;
use App\Pages\Provides\RouteServiceProvider;

class PagesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);
        //
        $this->app->singleton(PageComposerServiceContract::class, HomepageService::class);
        $this->app->singleton(ExperienceRepositoryContract::class, ExperienceRepository::class);
    }
}

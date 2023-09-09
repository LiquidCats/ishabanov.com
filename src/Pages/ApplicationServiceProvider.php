<?php

namespace ishabanov\Pages;

use Carbon\Laravel\ServiceProvider;
use ishabanov\Pages\Application\Services\PageComposerService;
use ishabanov\Pages\Domain\Contracts\Repositories\ExperienceRepositoryContract;
use ishabanov\Pages\Domain\Contracts\Services\PageComposerServiceContract;
use ishabanov\Pages\Infrastructure\Repositories\Eloquent\Repositories\ExperienceRepository;

class ApplicationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(PageComposerServiceContract::class, PageComposerService::class);
        $this->app->singleton(ExperienceRepositoryContract::class, ExperienceRepository::class);
    }
}

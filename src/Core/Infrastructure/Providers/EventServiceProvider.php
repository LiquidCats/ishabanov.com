<?php

declare(strict_types=1);

namespace ishabanov\Core\Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}

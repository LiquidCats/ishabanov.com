<?php

declare(strict_types=1);

namespace App\Domains\Homepage;

use App\Data\Database\Eloquent\Models\Experience;
use App\Domains\Homepage\Contracts\Repositories\ExperienceRepositoryContract;
use Illuminate\Support\ServiceProvider;

class HomepageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ExperienceRepositoryContract::class, Experience::class);
    }
}

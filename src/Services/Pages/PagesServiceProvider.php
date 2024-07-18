<?php

namespace App\Pages;

use App\Pages\Provides\RouteServiceProvider;
use Carbon\Laravel\ServiceProvider;

class PagesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);
    }
}

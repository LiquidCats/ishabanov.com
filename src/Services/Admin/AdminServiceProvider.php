<?php

namespace App\Admin;

use App\Admin\Provides\RouteServiceProvider;
use Carbon\Laravel\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);
    }
}

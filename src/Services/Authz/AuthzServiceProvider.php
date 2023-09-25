<?php

namespace App\Authz;

use App\Authz\Provides\RouteServiceProvider;
use Illuminate\Support\ServiceProvider;

class AuthzServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}

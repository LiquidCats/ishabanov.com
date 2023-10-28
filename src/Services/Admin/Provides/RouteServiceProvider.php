<?php

namespace App\Admin\Provides;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as BaseRouteServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends BaseRouteServiceProvider
{
    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware(['web', 'auth'])
                ->prefix('admin')
                ->group(__DIR__.'/../routes/web.php');

            Route::middleware(['api', 'auth:sanctum'])
                ->prefix('admin')
                ->prefix('api')
                ->group(__DIR__.'/../routes/api.php');
        });
    }
}

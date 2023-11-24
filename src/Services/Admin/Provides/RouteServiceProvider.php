<?php

namespace App\Admin\Provides;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as BaseRouteServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends BaseRouteServiceProvider
{
    public function boot(): void
    {
        $this->routes(function () {

            // Route::middleware(['api', 'auth:sanctum'])
            Route::middleware([])
                ->name('admin.api.')
                ->prefix('admin/api/v1')
                ->group(__DIR__.'/../routes/api.php');

            Route::middleware(['web', 'auth'])
                ->prefix('admin')
                ->group(__DIR__.'/../routes/web.php');
        });
    }
}

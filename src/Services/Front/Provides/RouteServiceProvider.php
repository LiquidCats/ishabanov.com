<?php

namespace App\Front\Provides;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as BaseRouteServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends BaseRouteServiceProvider
{
    public function boot(): void
    {
        $this->routes(static function () {
            Route::middleware(['api', 'auth:sanctum'])
                ->name('app.api.')
                ->prefix('app/api/v1')
                ->group(__DIR__.'/../routes/api.php');
        });

        $this->routes(function () {
            Route::middleware('web')
                ->name('app.')
                ->group(__DIR__.'/../routes/web.php');
        });
    }
}

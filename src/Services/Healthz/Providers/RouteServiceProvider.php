<?php

namespace App\Healthz\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as BaseRouteServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends BaseRouteServiceProvider
{
    public function boot(): void
    {
        $this->routes(static function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(__DIR__.'/../routes/api.php');
        });
    }
}

<?php

namespace App\Api\Provides;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as BaseRouteServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends BaseRouteServiceProvider
{
    public function boot(): void
    {
        $this->routes(static function () {
            Route::middleware('api')
                ->prefix('app/api/v1')
                ->group(__DIR__.'/../routes/api.php');
        });
    }
}

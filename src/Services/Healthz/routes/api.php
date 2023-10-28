<?php

use App\Services\Healthz\Presentation\Http\Controllers\HealthcheckController;
use Illuminate\Support\Facades\Route;

Route::middleware('throttle:3,60')
    ->any('healthz', HealthcheckController::class)
    ->name('api.healthcheck');

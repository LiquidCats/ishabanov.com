<?php

use App\Services\Healthz\Presentation\Http\Controllers\HealthcheckController;
use Illuminate\Support\Facades\Route;

Route::any('healthz', HealthcheckController::class)
    ->name('api.healthcheck');

<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use ishabanov\Api\Presentation\Http\Controllers\HealthcheckController;
use ishabanov\Api\Presentation\Http\Controllers\UserFeedbackController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('throttle:3,60')
    ->post('feedback', UserFeedbackController::class)
    ->name('api.feedback');

Route::middleware('throttle:3,60')
    ->any('healthz', HealthcheckController::class)
    ->name('api.healthcheck');

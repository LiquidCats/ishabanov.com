<?php

use App\Api\Presentation\Http\Controllers\UserFeedbackController;
use Illuminate\Support\Facades\Route;

Route::middleware('throttle:3,60')
    ->post('feedback', UserFeedbackController::class)
    ->name('api.feedback');

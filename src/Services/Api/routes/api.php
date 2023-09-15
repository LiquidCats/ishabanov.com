<?php

use Illuminate\Support\Facades\Route;
use App\Api\Presentation\Http\Controllers\UserFeedbackController;

Route::middleware('throttle:3,60')
    ->post('feedback', UserFeedbackController::class)
    ->name('api.feedback');



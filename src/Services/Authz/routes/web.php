<?php

declare(strict_types=1);

use App\Authz\Presentation\Http\Controllers\LoginController;
use App\Authz\Presentation\Http\Controllers\SignInController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')
    ->group(static function () {
        Route::get('login', LoginController::class)->name('auth.login');
        //
        Route::post('sign-in', SignInController::class)->name('auth.sign-in');
    });

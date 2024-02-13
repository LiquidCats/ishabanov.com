<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/{frontend?}', static fn () => view('views.layouts.default'))
    ->where('frontend', '.*')
    ->name('admin.dashboard');

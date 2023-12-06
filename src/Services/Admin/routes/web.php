<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/{frontend?}', static fn () => view('admin.layouts.default'))
    ->where('frontend', '.*')
    ->name('admin.dashboard');

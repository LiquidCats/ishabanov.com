<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/{vue?}', static fn () => view('admin.layouts.default'))
    ->where('vue', '.*')
    ->name('admin.dashboard');

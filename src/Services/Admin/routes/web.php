<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/{frontend?}', static fn () => view('layouts.admin'))
    ->where('frontend', '.*')
    ->name('admin.dashboard');

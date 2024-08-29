<?php

use Illuminate\Support\Facades\Route;

Route::get('/{frontend?}', static fn () => view('layouts.app'))
    ->where('frontend', '^(?!app\/api).*')
    ->name('home');

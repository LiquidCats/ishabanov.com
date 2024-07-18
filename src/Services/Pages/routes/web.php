<?php

use App\Pages\Presentation\Http\Controllers\AboutController;
use App\Pages\Presentation\Http\Controllers\HomepageController;
use App\Pages\Presentation\Http\Controllers\PostController;
use App\Pages\Presentation\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

Route::get('/{frontend?}', static fn () => view('layouts.app'))
    ->where('frontend', '.*')
    ->name('app.home');

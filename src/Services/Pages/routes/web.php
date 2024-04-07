<?php

use App\Pages\Presentation\Http\Controllers\AboutController;
use App\Pages\Presentation\Http\Controllers\HomepageController;
use App\Pages\Presentation\Http\Controllers\PostController;
use App\Pages\Presentation\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomepageController::class)->name('pages.home');
Route::get('/about', AboutController::class)->name('pages.about');

Route::prefix('blog')
    ->group(static function () {
        Route::get('/', PostsController::class)->name('pages.blog');
        Route::get('{post_id}', PostController::class)->name('pages.blog.post');
    });
Route::prefix('posts')
    ->group(static function () {
        Route::get('/', PostsController::class)->name('pages.blog');
        Route::get('{post_id}', PostController::class)->name('pages.blog.post');
    });

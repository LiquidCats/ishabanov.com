<?php

use App\Domains\Blog\ValueObjects\PostId;
use App\Front\Presentation\Http\Controllers\ArticleController;
use App\Front\Presentation\Http\Controllers\HomepageController;
use App\Front\Presentation\Http\Controllers\PostListController;
use Illuminate\Support\Facades\Route;

Route::get('homepage', HomepageController::class)
    ->name('homepage');
Route::get('settings', HomepageController::class)
    ->name('settings');

Route::prefix('posts')
    ->name('posts.')
    ->group(function () {
        Route::get('/', PostListController::class)
            ->name('list');
        Route::get(PostId::asRouteParameter(), ArticleController::class)
            ->name('article');
    });

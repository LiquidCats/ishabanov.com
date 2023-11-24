<?php

declare(strict_types=1);

use App\Admin\Presentation\Http\Controllers\Files\FilesListController;
use App\Admin\Presentation\Http\Controllers\Files\FilesStoreController;
use App\Admin\Presentation\Http\Controllers\Files\ImagesListController;
use App\Admin\Presentation\Http\Controllers\Posts\PostChangeStateController;
use App\Admin\Presentation\Http\Controllers\Posts\PostController;
use App\Admin\Presentation\Http\Controllers\Posts\PostDeleteController;
use App\Admin\Presentation\Http\Controllers\Posts\PostListController;
use Illuminate\Support\Facades\Route;

Route::prefix('posts')
    ->name('posts.')
    ->group(static function () {
        Route::get('/', PostListController::class)->name('list');
        Route::get('{post_id}', PostController::class)->name('list');
        Route::patch('/state/{post_id}', PostChangeStateController::class)->name('state');
        Route::delete('{post_id}', PostDeleteController::class)->name('delete');
    });
Route::prefix('files')
    ->name('files.')
    ->group(static function () {
        Route::get('images', ImagesListController::class)->name('images');
        Route::get('/', FilesListController::class)->name('list');
        Route::post('/', FilesStoreController::class)->name('store');
    });

<?php

declare(strict_types=1);

use App\Admin\Presentation\Http\Controllers\Files\FilesDeleteController;
use App\Admin\Presentation\Http\Controllers\Files\FilesListController;
use App\Admin\Presentation\Http\Controllers\Files\FilesStoreController;
use App\Admin\Presentation\Http\Controllers\Posts\PostChangeStateController;
use App\Admin\Presentation\Http\Controllers\Posts\PostController;
use App\Admin\Presentation\Http\Controllers\Posts\PostDeleteController;
use App\Admin\Presentation\Http\Controllers\Posts\PostListController;
use App\Admin\Presentation\Http\Controllers\Posts\PostStoreController;
use App\Admin\Presentation\Http\Controllers\Posts\PostUpdateController;
use App\Admin\Presentation\Http\Controllers\Tags\TagDeleteController;
use App\Admin\Presentation\Http\Controllers\Tags\TagListController;
use App\Admin\Presentation\Http\Controllers\Tags\TagStoreController;
use App\Admin\Presentation\Http\Controllers\Tags\TagUpdateController;
use App\Domains\Blog\ValueObjects\PostId;
use App\Domains\Blog\ValueObjects\TagId;
use App\Domains\Files\ValueObjects\FileId;
use Illuminate\Support\Facades\Route;

Route::prefix('posts')
    ->name('posts.')
    ->group(static function () {
        Route::get('/', PostListController::class)->name('list');
        Route::post('/', PostStoreController::class)->name('store');
        Route::get(PostId::AS_ROUTE_PARAMETER, PostController::class)->name('show');
        Route::put(PostId::AS_ROUTE_PARAMETER, PostUpdateController::class)->name('update');
        Route::patch('/state/'.PostId::AS_ROUTE_PARAMETER, PostChangeStateController::class)->name('state');
        Route::delete(PostId::AS_ROUTE_PARAMETER, PostDeleteController::class)->name('delete');
    });

Route::prefix('files')
    ->name('files.')
    ->group(static function () {
        Route::get('/', FilesListController::class)->name('list');
        Route::post('/', FilesStoreController::class)->name('store');
        Route::delete(FileId::AS_ROUTE_PARAMETER, FilesDeleteController::class)->name('delete');
    });

Route::prefix('tags')
    ->name('tags.')
    ->group(static function () {
        Route::get('/', TagListController::class)->name('list');
        Route::post('/', TagStoreController::class)->name('store');
        Route::put(TagId::AS_ROUTE_PARAMTER, TagUpdateController::class)->name('update');
        Route::delete(TagId::AS_ROUTE_PARAMTER, TagDeleteController::class)->name('delete');
    });

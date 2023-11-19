<?php

declare(strict_types=1);

use App\Admin\Presentation\Http\Controllers\DashboardController;
use App\Admin\Presentation\Http\Controllers\Files\FilesCreateController;
use App\Admin\Presentation\Http\Controllers\Files\FilesDeleteController;
use App\Admin\Presentation\Http\Controllers\Files\FilesListController;
use App\Admin\Presentation\Http\Controllers\Files\FilesStoreController;
use App\Admin\Presentation\Http\Controllers\Posts\PostChangeStateController;
use App\Admin\Presentation\Http\Controllers\Posts\PostCreateController;
use App\Admin\Presentation\Http\Controllers\Posts\PostDeleteController;
use App\Admin\Presentation\Http\Controllers\Posts\PostEditController;
use App\Admin\Presentation\Http\Controllers\Posts\PostListController;
use App\Admin\Presentation\Http\Controllers\Posts\PostStoreController;
use App\Admin\Presentation\Http\Controllers\Posts\PostUpdateController;
use App\Admin\Presentation\Http\Controllers\Tags\TagCreateController;
use App\Admin\Presentation\Http\Controllers\Tags\TagDeleteController;
use App\Admin\Presentation\Http\Controllers\Tags\TagEditController;
use App\Admin\Presentation\Http\Controllers\Tags\TagListController;
use App\Admin\Presentation\Http\Controllers\Tags\TagStoreController;
use App\Admin\Presentation\Http\Controllers\Tags\TagUpdateController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect(route('admin.dashboard')));
Route::get('dashboard', DashboardController::class)->name('admin.dashboard');

Route::prefix('posts')
    ->group(static function () {
        // POSTS
        // view
        Route::get('/', PostListController::class)->name('admin.posts.list');
        Route::get('create', PostCreateController::class)->name('admin.posts.create');
        Route::get('edit/{post_id}', PostEditController::class)->name('admin.posts.edit');

        // handle
        Route::post('store', PostStoreController::class)->name('admin.posts.store');
        Route::put('update/{post_id}', PostUpdateController::class)->name('admin.posts.update');
        Route::patch('state/{post_id}', PostChangeStateController::class)->name('admin.posts.state');
        Route::delete('delete/{post_id}', PostDeleteController::class)->name('admin.posts.delete');
    });
Route::prefix('tags')
    ->group(static function () {
        // TAGS
        // view
        Route::get('/', TagListController::class)->name('admin.tags.list');
        Route::get('create', TagCreateController::class)->name('admin.tags.create');
        Route::get('edit/{tag_id}', TagEditController::class)->name('admin.tags.edit');

        // handle
        Route::post('store', TagStoreController::class)->name('admin.tags.store');
        Route::put('update/{tag_id}', TagUpdateController::class)->name('admin.tags.update');
        Route::delete('delete/{tag_id}', TagDeleteController::class)->name('admin.tags.delete');
    });
Route::prefix('files')
    ->group(static function () {
        // FILES
        // view
        Route::get('/', FilesListController::class)->name('admin.files.list');
        Route::get('create', FilesCreateController::class)->name('admin.files.create');

        //handle
        Route::post('store', FilesStoreController::class)->name('admin.files.store');
        Route::delete('delete/{file_id}', FilesDeleteController::class)->name('admin.files.delete');
    });

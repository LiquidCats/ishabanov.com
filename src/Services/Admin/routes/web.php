<?php

declare(strict_types=1);

use App\Admin\Presentation\Http\Controllers\DashboardController;
use App\Admin\Presentation\Http\Controllers\PostCreateController;
use App\Admin\Presentation\Http\Controllers\PostListController;
use App\Admin\Presentation\Http\Controllers\PostStoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect(route('admin.dashboard')));
Route::get('dashboard', DashboardController::class)->name('admin.dashboard');

Route::prefix('posts')
    ->group(static function () {
        //
        // POSTS
        // view
        Route::get('/', PostListController::class)->name('admin.posts.list');
        Route::get('create', PostCreateController::class)->name('admin.posts.create');
        Route::get('edit/{post_id}', PostListController::class)->name('admin.posts.edit');

        // handle
        Route::post('store', PostStoreController::class)->name('admin.posts.store');
        Route::patch('state/{post_id}', fn () => redirect(route('admin.posts.list')))->name('admin.posts.state');
        Route::delete('delete/{post_id}', fn () => redirect(route('admin.posts.list')))->name('admin.posts.delete');
        // TAGS
        // FILES
    });

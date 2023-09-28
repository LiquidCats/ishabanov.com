<?php

declare(strict_types=1);

use App\Admin\Presentation\Http\Controllers\DashboardController;
use App\Admin\Presentation\Http\Controllers\PostListController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')
    ->prefix('admin')
    ->group(static function () {
        Route::get('/', fn () => redirect(route('admin.dashboard')));
        //
        Route::get('dashboard', DashboardController::class)->name('admin.dashboard');
        Route::get('posts', PostListController::class)->name('admin.posts.list');
        Route::get('posts/{post_id}', PostListController::class)->name('admin.posts.edit');
    });

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
use App\Admin\Presentation\Http\Controllers\Users\UserController;
use App\Admin\Presentation\Http\Controllers\Users\UserDeleteController;
use App\Admin\Presentation\Http\Controllers\Users\UserListController;
use App\Admin\Presentation\Http\Controllers\Users\UserStoreController;
use App\Admin\Presentation\Http\Controllers\Users\UserVerifyController;
use App\Domains\Blog\ValueObjects\PostId;
use App\Domains\Blog\ValueObjects\TagId;
use App\Domains\Files\ValueObjects\FileId;
use App\Domains\User\ValueObjets\UserId;
use Illuminate\Support\Facades\Route;

Route::prefix('posts')
    ->name('posts.')
    ->group(static function () {
        Route::get('/', PostListController::class)->name('list');
        Route::post('/', PostStoreController::class)->name('store');
        Route::get(PostId::asRouteParameter(), PostController::class)->name('show');
        Route::put(PostId::asRouteParameter(), PostUpdateController::class)->name('update');
        Route::patch('/state/'.PostId::asRouteParameter(), PostChangeStateController::class)->name('state');
        Route::delete(PostId::asRouteParameter(), PostDeleteController::class)->name('delete');
    });

Route::prefix('users')
    ->name('users.')
    ->group(static function () {
        Route::get('/', UserListController::class)->name('list');
        Route::post('/', UserStoreController::class)->name('store');
        Route::get(UserId::asRouteParameter(), UserController::class)->name('show');
        Route::put(UserId::asRouteParameter(), PostUpdateController::class)->name('update');
        Route::delete(UserId::asRouteParameter(), UserDeleteController::class)->name('delete');

        Route::post('/verify/'.UserId::asRouteParameter(), UserVerifyController::class)->name('verify');

        Route::put('/password/'.UserId::asRouteParameter(), UserVerifyController::class)->name('password');


        Route::get('/2fa/'.UserId::asRouteParameter(), UserVerifyController::class)->name('2fa.get');
        Route::put('/2fa/'.UserId::asRouteParameter(), UserVerifyController::class)->name('2fa.reset');
    });

Route::prefix('files')
    ->name('files.')
    ->group(static function () {
        Route::get('/', FilesListController::class)->name('list');
        Route::post('/', FilesStoreController::class)->name('store');
        Route::delete(FileId::asRouteParameter(), FilesDeleteController::class)->name('delete');
    });

Route::prefix('tags')
    ->name('tags.')
    ->group(static function () {
        Route::get('/', TagListController::class)->name('list');
        Route::post('/', TagStoreController::class)->name('store');
        Route::put(TagId::asRouteParameter(), TagUpdateController::class)->name('update');
        Route::delete(TagId::asRouteParameter(), TagDeleteController::class)->name('delete');
    });

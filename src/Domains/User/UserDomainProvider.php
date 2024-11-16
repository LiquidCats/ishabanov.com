<?php

declare(strict_types=1);

namespace App\Domains\User;

use App\Data\Database\Eloquent\Models\UserModel;
use App\Domains\User\Contracts\Repositories\UserRepositoryContract;
use App\Domains\User\Contracts\Services\UserServiceContract;
use App\Domains\User\Services\UserService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class UserDomainProvider extends ServiceProvider
{
    public function boot(): void
    {
        Route::pattern('user_id', '[0-9]{1,32}');
    }

    public function register(): void
    {
        $this->app->bind(UserRepositoryContract::class, UserModel::class);

        $this->app->singleton(UserServiceContract::class, UserService::class);
    }
}

<?php

declare(strict_types=1);

namespace App\Domains\User;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class UserDomainProvider extends ServiceProvider
{
    public function boot(): void
    {
        Route::pattern('user_id', '[0-9]{1,32}');
    }
}

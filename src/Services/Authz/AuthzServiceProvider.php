<?php

namespace App\Authz;

use App\Authz\Provides\RouteServiceProvider;
use Illuminate\Support\ServiceProvider;
use LiquidCats\G2FA\Enums\Algorithm;
use LiquidCats\G2FA\TOTP;

class AuthzServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->singleton(TOTP::class, fn () => new TOTP(
            algorithm: Algorithm::SHA1, // @TODO: must be updated to sha512
            length: 6,
            epoch: 1,
            period: 30,
        ));
    }
}

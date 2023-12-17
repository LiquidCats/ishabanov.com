<?php

namespace App\Authz;

use App\Authz\Provides\RouteServiceProvider;
use Illuminate\Support\ServiceProvider;
use LiquidCats\G2FA\Enums\Algorithm;
use LiquidCats\G2FA\OTPGenerator;
use LiquidCats\G2FA\Support\SecretValidator;
use LiquidCats\G2FA\TOTPVerificator;

class AuthzServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->singleton(TOTPVerificator::class, static function () {
            $validator = new SecretValidator();
            $generator = new OTPGenerator($validator, Algorithm::SHA512, 6);

            return new TOTPVerificator($generator, 30, 2);
        });
    }
}

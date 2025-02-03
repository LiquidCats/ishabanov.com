<?php

declare(strict_types=1);

namespace App\Domains\User\Dto;

use Illuminate\Http\Request;

readonly class UserDto
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public ?string $otpCode = null,
        public ?string $currentPassword = null,
    ) {}

    public static function fromRequest(Request $request): static
    {
        return new static(
            $request->get('name'),
            $request->get('email'),
            $request->get('password'),
            $request->get('2fa_otp'),
            $request->get('currentPassword'),
        );
    }
}

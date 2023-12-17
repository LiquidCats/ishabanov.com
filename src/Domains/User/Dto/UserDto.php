<?php

declare(strict_types=1);

namespace App\Domains\User\Dto;

use Illuminate\Http\Request;
use Illuminate\Support\Fluent;

/**
 * @property-read string|null $name
 * @property-read string|null $email
 * @property-read string|null $password
 */
class UserDto extends Fluent
{
    public static function fromRequest(Request $request)
    {
        return new static([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ]);
    }
}

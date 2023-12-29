<?php

declare(strict_types=1);

namespace App\Domains\User\Contracts\Repositories;

use App\Data\Database\Eloquent\Models\UserModel;
use App\Domains\User\Dto\UserDto;

interface UserRepository
{
    public function create(UserDto $userDto): UserModel;
}

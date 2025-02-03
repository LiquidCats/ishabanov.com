<?php

declare(strict_types=1);

namespace App\Domains\User\Contracts\Services;

use App\Data\Database\Eloquent\Models\UserModel;
use App\Domains\User\Dto\UserDto;
use App\Domains\User\ValueObjets\UserId;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserServiceContract
{
    public function paginate(): LengthAwarePaginator;

    public function getUser(UserId $userId): UserModel;

    public function createUser(UserDto $dto): UserModel;
    public function verifyUser(UserId $userId): UserModel;
    public function deleteUser(UserId $userId): UserModel;
}

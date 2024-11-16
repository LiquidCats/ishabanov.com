<?php

declare(strict_types=1);

namespace App\Domains\User\Contracts\Services;

use App\Data\Database\Eloquent\Models\UserModel;
use App\Domains\User\ValueObjets\UserId;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserServiceContract
{
    public function paginate(): LengthAwarePaginator;

    public function getUser(UserId $userId): UserModel;
}

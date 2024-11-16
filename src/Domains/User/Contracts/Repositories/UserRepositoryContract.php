<?php

declare(strict_types=1);

namespace App\Domains\User\Contracts\Repositories;

use App\Data\Database\Eloquent\Models\UserModel;
use App\Domains\User\ValueObjets\UserId;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserRepositoryContract
{
    public function getLatest(int $perPage = 15): LengthAwarePaginator;

    public function getById(UserId $id): UserModel;
}

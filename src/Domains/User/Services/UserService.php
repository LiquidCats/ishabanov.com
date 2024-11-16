<?php

declare(strict_types=1);

namespace App\Domains\User\Services;

use App\Data\Database\Eloquent\Models\UserModel;
use App\Domains\User\Contracts\Repositories\UserRepositoryContract;
use App\Domains\User\Contracts\Services\UserServiceContract;
use App\Domains\User\ValueObjets\UserId;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

readonly class UserService implements UserServiceContract
{
    public function __construct(private UserRepositoryContract $userRepository) {}

    public function paginate(): LengthAwarePaginator
    {
        return $this->userRepository->getLatest();
    }

    public function getUser(UserId $userId): UserModel
    {
        return UserModel::query()
            ->where('id', $userId)
            ->firstOrFail();
    }
}

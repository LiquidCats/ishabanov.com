<?php

declare(strict_types=1);

namespace App\Domains\User\Services;

use App\Data\Database\Eloquent\Models\UserModel;
use App\Domains\User\Contracts\Repositories\UserRepositoryContract;
use App\Domains\User\Contracts\Services\UserServiceContract;
use App\Domains\User\ValueObjets\UserId;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

readonly class UserService implements UserServiceContract
{
    public function __construct(private UserRepositoryContract $userRepository) {}

    public function paginate(): LengthAwarePaginator
    {
        return $this->userRepository->getLatest();
    }

    public function getUser(UserId $userId): UserModel
    {
        if ($userId->equals(Auth::id())) {
            return $this->userRepository->getById($userId);
        }

        throw new NotFoundHttpException('not found');
    }
}

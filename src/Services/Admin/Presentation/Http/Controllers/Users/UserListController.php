<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Users;

use App\Admin\Presentation\Http\Resources\UserResource;
use App\Domains\User\Contracts\Services\UserServiceContract;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;

class UserListController extends Controller
{
    public function __construct(private readonly UserServiceContract $userService) {}

    public function __invoke(): AnonymousResourceCollection
    {
        $users = $this->userService->paginate();

        return UserResource::collection($users);
    }
}

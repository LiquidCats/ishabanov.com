<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Users;

use App\Admin\Presentation\Http\Requests\UserCreateRequest;
use App\Admin\Presentation\Http\Resources\UserResource;
use App\Domains\User\Contracts\Services\UserServiceContract;
use App\Domains\User\Dto\UserDto;
use Illuminate\Routing\Controller;

class UserStoreController extends Controller
{
    public function __construct(
        private readonly UserServiceContract $service,
    ) {}

    public function __invoke(UserCreateRequest $request): UserResource
    {
        $dto = UserDto::fromRequest($request);
        $user = $this->service->createUser($dto);

        return UserResource::make($user);
    }
}

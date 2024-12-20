<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Users;

use App\Admin\Presentation\Http\Resources\UserResource;
use App\Domains\User\Contracts\Services\UserServiceContract;
use App\Domains\User\ValueObjets\UserId;
use App\Foundation\Context\Context;
use Illuminate\Routing\Controller;

class UserVerifyController extends Controller
{
    public function __construct(
        private readonly Context $context,
        private readonly UserServiceContract $service,
    ) {}

    public function __invoke(): UserResource
    {
        $userId = $this->context->resolve(UserId::class);

        $model = $this->service->verifyUser($userId);

        return UserResource::make($model);
    }
}

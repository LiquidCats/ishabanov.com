<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Posts;

use App\Admin\Presentation\Http\Resources\PostResource;
use App\Domains\Blog\Contracts\Services\PostServiceContract;
use App\Domains\Blog\ValueObjects\PostId;
use App\Foundation\Context\Context;
use Illuminate\Routing\Controller;

class PostChangeStateController extends Controller
{
    public function __construct(
        private readonly Context $context,
        private readonly PostServiceContract $service,
    ) {
    }

    public function __invoke(string $postId): PostResource
    {
        $postId = $this->context->resolve(PostId::class);
        $model = $this->service->changeState($postId);

        return PostResource::make($model);
    }
}

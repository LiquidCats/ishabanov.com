<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Posts;

use App\Admin\Presentation\Http\Requests\PostUpdateRequest;
use App\Admin\Presentation\Http\Resources\PostResource;
use App\Domains\Blog\Contracts\Services\PostServiceContract;
use App\Domains\Blog\Dto\PostDto;
use App\Domains\Blog\ValueObjects\PostId;
use App\Foundation\Context\Context;
use Illuminate\Routing\Controller;

class PostUpdateController extends Controller
{
    public function __construct(
        private readonly Context $context,
        private readonly PostServiceContract $service,
    ) {
    }

    public function __invoke(PostUpdateRequest $request): PostResource
    {
        $model = $this->service->updatePost(
            $this->context->resolve(PostId::class),
            PostDto::fromRequest($request),
        );

        return PostResource::make($model);
    }
}

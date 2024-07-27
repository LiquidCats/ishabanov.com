<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Posts;

use App\Admin\Presentation\Http\Resources\PostResource;
use App\Domains\Blog\Contracts\Services\PostServiceContract;
use App\Domains\Blog\ValueObjects\PostId;
use App\Foundation\Context\Context;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;

class PostDeleteController extends Controller
{
    public function __construct(
        private readonly Context $context,
        private readonly PostServiceContract $service,
    ) {
    }

    public function __invoke(string $postId): AnonymousResourceCollection
    {
        $postId = $this->context->resolve(PostId::class);
        $touchedPosts = $this->service->deletePost($postId);

        return PostResource::collection($touchedPosts);
    }
}

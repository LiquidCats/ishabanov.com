<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Posts;

use App\Admin\Presentation\Http\Resources\PostResource;
use App\Domains\Blog\Contracts\Services\PostServiceContract;
use App\Domains\Blog\ValueObjects\PostId;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;

class PostDeleteController extends Controller
{
    public function __construct(private readonly PostServiceContract $service)
    {
    }

    public function __invoke(string $postId): AnonymousResourceCollection
    {
        $touchedPosts = $this->service->deletePost(new PostId($postId));

        return PostResource::collection($touchedPosts);
    }
}

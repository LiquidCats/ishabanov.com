<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Posts;

use App\Admin\Presentation\Http\Resources\PostResource;
use App\Domains\Blog\Contracts\Services\PostServiceContract;
use App\Domains\Blog\ValueObjects\PostId;
use App\Foundation\Context\Context;
use Illuminate\Routing\Controller;

class PostController extends Controller
{
    public function __construct(
        private readonly Context $context,
        private readonly PostServiceContract $service,
    ) {}

    public function __invoke(): PostResource
    {
        $post = $this->service->getPost(
            $this->context->resolve(PostId::class)
        );

        return PostResource::make($post);
    }
}

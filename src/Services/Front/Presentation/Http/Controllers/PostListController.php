<?php

declare(strict_types=1);

namespace App\Front\Presentation\Http\Controllers;

use App\Domains\Blog\Contracts\Services\PostServiceContract;
use App\Front\Presentation\Http\Resources\PostResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;

class PostListController extends Controller
{
    public function __construct(
        private readonly PostServiceContract $service,
    ) {}

    public function __invoke(): AnonymousResourceCollection
    {
        $posts = $this->service->getArticles();

        return PostResource::collection($posts);
    }
}

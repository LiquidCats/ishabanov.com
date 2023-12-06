<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Posts;

use App\Admin\Presentation\Http\Resources\PostResource;
use App\Domains\Blog\Contracts\Services\PostServiceContract;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;

class PostListController extends Controller
{
    public function __construct(private readonly PostServiceContract $service)
    {
    }

    public function __invoke(): AnonymousResourceCollection
    {
        return PostResource::collection($this->service->paginate());
    }
}

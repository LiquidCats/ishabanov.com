<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Posts;

use App\Admin\Presentation\Http\Requests\PostStoreRequest;
use App\Admin\Presentation\Http\Resources\PostResource;
use App\Domains\Blog\Contracts\Services\PostServiceContract;
use Illuminate\Routing\Controller;

class PostStoreController extends Controller
{
    public function __construct(private readonly PostServiceContract $service)
    {
    }

    public function __invoke(PostStoreRequest $request): PostResource
    {
        $model = $this->service->createPost($request->validated());

        return PostResource::make($model);
    }
}

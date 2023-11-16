<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Posts;

use App\Admin\Presentation\Http\Requests\PostStoreRequest;
use App\Domains\Blog\Contracts\Services\PostServiceContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use function redirect;
use function route;

class PostStoreController extends Controller
{
    public function __construct(private readonly PostServiceContract $service)
    {
    }

    public function __invoke(PostStoreRequest $request): RedirectResponse
    {
        $model = $this->service->createPost($request->validated());

        return redirect(
            route(
                'admin.posts.edit',
                ['post_id' => $model->getKey()]
            )
        );
    }
}

<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers;

use App\Admin\Presentation\Http\Requests\PostUpdateRequest;
use App\Domains\Blog\Contracts\Services\BlogServiceContract;
use App\Domains\Blog\ValueObjects\PostId;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

use function redirect;
use function route;

class PostUpdateController extends Controller
{
    public function __construct(private readonly BlogServiceContract $service)
    {
    }

    public function __invoke(PostUpdateRequest $request, string $postId): RedirectResponse
    {
        $model = $this->service->updatePost(new PostId($postId), $request->validated());

        return redirect()
            ->intended(
                route(
                    'admin.posts.edit',
                    ['post_id' => $model->getKey()]
                )
            );
    }
}

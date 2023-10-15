<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers;

use App\Domains\Blog\Contracts\Services\BlogServiceContract;
use App\Domains\Blog\ValueObjects\PostId;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use function redirect;
use function route;

class PostDeleteController extends Controller
{
    public function __construct(private readonly BlogServiceContract $service)
    {
    }

    public function __invoke(string $postId): RedirectResponse
    {
        $this->service->deletePost(new PostId($postId));

        return redirect(route('admin.posts.list'));
    }
}

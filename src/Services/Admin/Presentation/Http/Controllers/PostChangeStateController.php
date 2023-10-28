<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers;

use App\Domains\Blog\Contracts\Services\BlogServiceContract;
use App\Domains\Blog\ValueObjects\PostId;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

use function redirect;
use function route;

class PostChangeStateController extends Controller
{
    public function __construct(private readonly BlogServiceContract $service)
    {
    }

    public function __invoke(string $postId): RedirectResponse
    {
        $postId = new PostId($postId);

        $this->service->changeState($postId);

        return redirect()->intended(
            route('admin.posts.list')
        );
    }
}

<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Posts;

use App\Domains\Blog\Contracts\Services\PostServiceContract;
use App\Domains\Blog\ValueObjects\PostId;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use function redirect;
use function route;

class PostChangeStateController extends Controller
{
    public function __construct(private readonly PostServiceContract $service)
    {
    }

    public function __invoke(string $postId): RedirectResponse
    {
        $this->service->changeState(new PostId($postId));

        return redirect(route('admin.posts.list'));
    }
}

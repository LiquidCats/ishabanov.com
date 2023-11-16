<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Posts;

use App\Admin\Application\Services\PostsPageComposer;
use App\Domains\Blog\ValueObjects\PostId;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class PostEditController extends Controller
{
    public function __construct(private readonly PostsPageComposer $service)
    {
    }

    public function __invoke(string $postId): View
    {
        return $this->service->edit(new PostId($postId));
    }
}

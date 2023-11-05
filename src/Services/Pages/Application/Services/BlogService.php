<?php

declare(strict_types=1);

namespace App\Pages\Application\Services;

use App\Domains\Blog\Contracts\Repositories\PostRepositoryContract;
use App\Domains\Kernel\Contracts\Services\PageComposerServiceContract;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

readonly class BlogService implements PageComposerServiceContract
{
    public function __construct(private PostRepositoryContract $postRepository)
    {
    }

    public function view(Request $request): View
    {
        $posts = $this->postRepository->getWithTags();

        return \view('pages.blog.list', ['posts' => $posts]);
    }
}

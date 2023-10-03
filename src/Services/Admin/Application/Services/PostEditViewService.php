<?php

declare(strict_types=1);

namespace App\Admin\Application\Services;

use App\Domains\Blog\Contracts\Repositories\PostRepositoryContract;
use App\Domains\Blog\Contracts\Repositories\TagRepositoryContract;
use App\Domains\Blog\ValueObjects\PostId;
use App\Domains\Kernel\Contracts\Services\PageComposerServiceContract;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use function compact;
use function view;

readonly class PostEditViewService implements PageComposerServiceContract
{
    public function __construct(
        private PostRepositoryContract $postRepository,
        private TagRepositoryContract $tagRepository
    ) {
    }

    public function view(Request $request): View
    {
        $postId = new PostId($request->route()->parameter('post_id'));

        $post = $this->postRepository->findById($postId);
        $tags = $this->tagRepository->getAll();

        $postTagIds = $post?->tags?->pluck('id');

        return view(
            'admin.pages.posts.edit',
            compact('tags', 'post', 'postTagIds')
        );
    }
}

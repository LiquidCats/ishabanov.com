<?php

declare(strict_types=1);

namespace App\Pages\Application\Services;

use App\Domains\Blog\Contracts\Repositories\PostRepositoryContract;
use App\Domains\Blog\ValueObjects\PostId;
use App\Domains\Kernel\Contracts\Services\PageComposerServiceContract;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function abort;
use function now;
use function view;

readonly class PostService implements PageComposerServiceContract
{
    public function __construct(private PostRepositoryContract $postRepository)
    {
    }

    public function view(Request $request): View
    {
        $postId = PostId::fromRequest($request);

        $post = $this->postRepository->findById($postId);

        if (! Auth::check()) {
            if ($post->is_draft || $post->published_at->greaterThan(now())) {
                abort(404);
            }
        }

        $prev = $this->postRepository->getPrevious($postId);
        $next = $this->postRepository->getNext($postId);
        $similar = $this->postRepository->getSimilarByTag($postId, $post->tags);

        return view('pages.blog.post')
            ->with('prev', $prev)
            ->with('next', $next)
            ->with('latest', $similar)
            ->with('post', $post);
    }
}

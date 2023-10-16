<?php

declare(strict_types=1);

namespace App\Pages\Presentation\Http\Controllers;

use App\Data\Database\Eloquent\Models\Post;
use App\Domains\Blog\ValueObjects\PostId;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use function now;
use function view;

class PostController extends Controller
{
    public function __invoke(Request $request): View
    {
        $postId = $request->route()?->parameter('post_id');
        $postId = new PostId($postId);

        $post = Post::query()->with('tags')
            ->findOrFail($postId->value);

        $next = Post::query()
            ->select(['title', 'id'])
            ->where('id', '>', $post->getKey())
            ->oldest('id')
            ->where('is_draft', 0)
            ->where('published_at', '<=', now())
            ->first();

        $prev = Post::query()
            ->select(['title', 'id'])
            ->where('id', '<', $post->getKey())
            ->latest('id')
            ->where('is_draft', 0)
            ->where('published_at', '<=', now())
            ->first();

        $latest = Post::query()
            ->select(['title', 'content', 'published_at', 'id'])
            ->with('tags', fn (BelongsToMany $q) => $q->limit(3))
            ->where('id', '<', $post->getKey())
            ->latest('id')
            ->where('is_draft', 0)
            ->where('published_at', '<=', now())
            ->limit(5)
            ->get();

        return view('pages.blog.post')
            ->with('prev', $prev)
            ->with('next', $next)
            ->with('latest', $latest)
            ->with('post', $post);
    }
}

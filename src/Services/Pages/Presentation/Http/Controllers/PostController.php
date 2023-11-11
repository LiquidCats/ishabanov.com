<?php

declare(strict_types=1);

namespace App\Pages\Presentation\Http\Controllers;

use App\Data\Database\Eloquent\Models\Post;
use App\Data\Database\Eloquent\Models\Tag;
use App\Domains\Blog\ValueObjects\PostId;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use function now;
use function view;

class PostController extends Controller
{
    public function __invoke(Request $request): View
    {
        $postId = PostId::fromRequest($request);

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

        $similar = Post::query()
            ->select(['title', 'preview', 'published_at', 'id'])
            ->whereHas('tags', static function (Builder $builder) use ($post) {
                $builder->where(function (Builder $builder) use ($post) {
                    /** @var Tag $tag */
                    foreach ($post->tags as $tag) {
                        $builder->orWhere('id', $tag->getKey());
                    }
                });
            })
            ->where('id', '!=', $post->getKey())
            ->where('is_draft', 0)
            ->where('published_at', '<=', now())
            ->latest('id')
            ->limit(3)
            ->get();

        return view('themes.default.pages.post.article')
            ->with('prev', $prev)
            ->with('next', $next)
            ->with('similar', $similar)
            ->with('post', $post);
    }
}

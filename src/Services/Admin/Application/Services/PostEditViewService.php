<?php

declare(strict_types=1);

namespace App\Admin\Application\Services;

use App\Data\Database\Eloquent\Models\File;
use App\Domains\Blog\Contracts\Repositories\PostRepositoryContract;
use App\Domains\Blog\Contracts\Repositories\TagRepositoryContract;
use App\Domains\Blog\ValueObjects\PostId;
use App\Domains\Kernel\Contracts\Services\PageComposerServiceContract;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $postId = new PostId($request->route()?->parameter('post_id'));

        $post = $this->postRepository->findById($postId);
        $tags = $this->tagRepository->getAll();

        $inputPostTags = $request->old('post_tags');
        $postTagIds = empty($inputPostTags) ? $post?->tags?->pluck('id') : $inputPostTags;

        $images = File::all()->map(fn (File $f) => ['title' => $f->name, 'value' => Storage::url($f->path)]);

        return view('admin.pages.posts.edit')
            ->with('images', $images)
            ->with('tags', $tags)
            ->with('post', $post)
            ->with('postTagIds', $postTagIds);
    }
}

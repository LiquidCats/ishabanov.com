<?php

declare(strict_types=1);

namespace App\Admin\Application\Services;

use App\Data\Database\Eloquent\Models\File;
use App\Domains\Blog\Contracts\Repositories\PostRepositoryContract;
use App\Domains\Kernel\Contracts\Services\PageComposerServiceContract;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

readonly class PostListViewService implements PageComposerServiceContract
{
    public function __construct(private PostRepositoryContract $postRepository)
    {
    }

    public function view(Request $request): View
    {
        $posts = $this->postRepository->getLatest();

        $images = File::all()->map(fn (File $f) => ['title' => $f->name, 'value' => Storage::url($f->path)]);

        return view('admin.pages.posts.list')
            ->with('posts', $posts)
            ->with('images', $images);
    }
}

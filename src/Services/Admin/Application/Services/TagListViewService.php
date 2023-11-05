<?php

declare(strict_types=1);

namespace App\Admin\Application\Services;

use App\Domains\Blog\Contracts\Repositories\TagRepositoryContract;
use App\Domains\Kernel\Contracts\Services\PageComposerServiceContract;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use function compact;
use function view;

readonly class TagListViewService implements PageComposerServiceContract
{
    public function __construct(private TagRepositoryContract $tagRepository)
    {
    }

    public function view(Request $request): View
    {
        $tags = $this->tagRepository->getAllWithPostsCount();

        return view('admin.pages.tags.list')
            ->with('tags', $tags);
    }
}

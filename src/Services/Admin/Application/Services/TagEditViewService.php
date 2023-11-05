<?php

declare(strict_types=1);

namespace App\Admin\Application\Services;

use App\Domains\Blog\Contracts\Repositories\TagRepositoryContract;
use App\Domains\Blog\ValueObjects\TagId;
use App\Domains\Kernel\Contracts\Services\PageComposerServiceContract;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

use function view;

readonly class TagEditViewService implements PageComposerServiceContract
{
    public function __construct(private TagRepositoryContract $tagRepository)
    {
    }

    public function view(Request $request): View
    {
        $tagId = TagId::fromRequest($request);

        $tag = $this->tagRepository->findById($tagId);

        return view('admin.pages.tags.edit')
            ->with('tag', $tag);
    }
}

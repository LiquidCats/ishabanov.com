<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Tags;

use App\Admin\Presentation\Http\Requests\TagStoreRequest;
use App\Data\Database\Eloquent\Models\Tag;
use App\Domains\Blog\Contracts\Services\TagServiceContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use function redirect;
use function route;

class TagStoreController extends Controller
{
    public function __construct(private readonly TagServiceContract $tagService)
    {
    }

    public function __invoke(TagStoreRequest $request): RedirectResponse
    {
        $tag = $this->tagService->create(
            $request->validated('name'),
            $request->validated('slug'),
        );

        return redirect(route('admin.tags.edit', ['tag_id' => $tag->getKey()]));
    }
}

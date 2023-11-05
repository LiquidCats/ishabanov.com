<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Tags;

use App\Admin\Presentation\Http\Requests\TagUpdateRequest;
use App\Domains\Blog\Contracts\Services\TagServiceContract;
use App\Domains\Blog\ValueObjects\TagId;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

use function redirect;
use function route;

class TagUpdateController extends Controller
{
    public function __construct(private readonly TagServiceContract $tagService)
    {
    }

    public function __invoke(TagUpdateRequest $request, string $tagId): RedirectResponse
    {
        $redirectTo = route('admin.tags.edit', ['tag_id' => $tagId]);

        $ok = $this->tagService->update(
            new TagId($tagId),
            $request->validated('name'),
            $request->validated('slug'),
        );
        if (! $ok) {
            return redirect($redirectTo)
                ->withInput()
                ->withErrors(['slug' => ['The slug has already been taken.']]);
        }

        return redirect($redirectTo);
    }
}

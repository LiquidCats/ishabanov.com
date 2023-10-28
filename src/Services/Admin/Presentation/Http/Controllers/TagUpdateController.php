<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers;

use App\Admin\Presentation\Http\Requests\TagUpdateRequest;
use App\Data\Database\Eloquent\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

use function redirect;
use function route;

class TagUpdateController extends Controller
{
    public function __construct()
    {
    }

    public function __invoke(TagUpdateRequest $request, string $tagId): RedirectResponse
    {

        /** @var Tag $tag */
        $tag = Tag::query()->findOrFail($tagId);

        $tag->name = $request->validated('name');

        $newSlug = $request->validated('slug');
        $redirectTo = route('admin.tags.edit', ['tag_id' => $tag->getKey()]);

        if ($tag->slug !== $newSlug) {
            $count = Tag::query()->where('slug', $newSlug)->count();
            if ($count !== 0) {
                return redirect($redirectTo)
                    ->withInput()
                    ->withErrors(['slug' => ['The slug has already been taken.']]);
            }
            $tag->slug = $newSlug;
        }

        $tag->save();

        return redirect($redirectTo);
    }
}

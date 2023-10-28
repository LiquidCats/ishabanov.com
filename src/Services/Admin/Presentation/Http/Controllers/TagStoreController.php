<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers;

use App\Admin\Presentation\Http\Requests\TagStoreRequest;
use App\Data\Database\Eloquent\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

use function redirect;
use function route;

class TagStoreController extends Controller
{
    public function __construct()
    {
    }

    public function __invoke(TagStoreRequest $request): RedirectResponse
    {
        $tag = new Tag();

        $tag->name = $request->validated('name');
        $tag->slug = $request->validated('slug');

        $tag->save();

        return redirect(route('admin.tags.edit', ['tag_id' => $tag->getKey()]));
    }
}

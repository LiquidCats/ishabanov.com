<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers;

use App\Data\Database\Eloquent\Models\Tag;
use App\Domains\Blog\ValueObjects\TagId;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use function redirect;
use function route;

class TagDeleteController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $tagId = $request->route()?->parameter('tag_id');
        $tagId = new TagId($tagId);

        Tag::destroy($tagId->value);

        return redirect(route('admin.tags.list'));
    }
}

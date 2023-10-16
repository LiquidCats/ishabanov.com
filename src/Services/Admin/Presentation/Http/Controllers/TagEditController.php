<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers;

use App\Data\Database\Eloquent\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use function compact;
use function view;

class TagEditController extends Controller
{
    public function __construct()
    {
    }

    public function __invoke(Request $request): View
    {
        $tagId = $request->route()->parameter('tag_id');

        $tag = Tag::query()->findOrFail($tagId);

        return view('admin.pages.tags.edit', compact('tag'));
    }
}

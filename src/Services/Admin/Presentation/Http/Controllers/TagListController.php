<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers;

use App\Data\Database\Eloquent\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

use function compact;
use function view;

class TagListController extends Controller
{
    public function __construct()
    {
    }

    public function __invoke(): View
    {
        $tags = Tag::query()->withCount('posts')->get();

        return view('admin.pages.tags.list', compact('tags'));
    }
}

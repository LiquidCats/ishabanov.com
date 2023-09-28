<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers;

use App\Data\Database\Eloquent\Models\Post;
use Illuminate\Routing\Controller;
use function compact;
use function view;

class PostListController extends Controller
{
    public function __invoke()
    {
        $posts = Post::query()->with('tags')->latest()->paginate(5);
        return view('admin.pages.posts.list', compact('posts'));
    }
}

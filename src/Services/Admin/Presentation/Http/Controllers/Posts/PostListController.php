<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Posts;

use App\Admin\Application\Services\PostsPageComposer;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class PostListController extends Controller
{
    public function __construct(private readonly PostsPageComposer $service)
    {
    }

    public function __invoke(): View
    {
        return $this->service->list();
    }
}

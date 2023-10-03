<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers;

use App\Data\Database\Eloquent\Models\Post;
use App\Data\Database\Eloquent\Models\Tag;
use App\Domains\Blog\ValueObjects\PostId;
use App\Domains\Kernel\Contracts\Services\PageComposerServiceContract;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use function compact;
use function view;

class PostEditController extends Controller
{
    public function __construct(private readonly PageComposerServiceContract $service)
    {
    }

    public function __invoke(Request $request): View
    {
        return $this->service->view($request);
    }
}

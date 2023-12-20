<?php

declare(strict_types=1);

namespace App\Pages\Presentation\Http\Controllers;

use App\Domains\Blog\ValueObjects\PostId;
use App\Pages\Application\Services\SitePageComposer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostController extends Controller
{
    public function __construct(private readonly SitePageComposer $service)
    {
    }

    public function __invoke(Request $request): View
    {
        $postId = PostId::fromRequestRoute($request);

        return $this->service->post($postId);
    }
}

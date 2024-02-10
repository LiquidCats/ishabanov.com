<?php

declare(strict_types=1);

namespace App\Pages\Presentation\Http\Controllers;

use App\Domains\Blog\ValueObjects\PostId;
use App\Domains\Pages\Contracts\Services\SitePagesServiceContract;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostController extends Controller
{
    public function __construct(private readonly SitePagesServiceContract $service)
    {
    }

    public function __invoke(Request $request): View
    {
        $postId = PostId::fromRequestRoute($request);

        return $this->service->post($postId);
    }
}

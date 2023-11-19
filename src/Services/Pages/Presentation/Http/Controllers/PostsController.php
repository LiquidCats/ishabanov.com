<?php

declare(strict_types=1);

namespace App\Pages\Presentation\Http\Controllers;

use App\Pages\Application\Services\SitePageComposer;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class PostsController extends Controller
{
    public function __construct(private readonly SitePageComposer $service)
    {
    }

    public function __invoke(): View
    {
        return $this->service->posts();
    }
}

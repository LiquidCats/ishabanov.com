<?php

declare(strict_types=1);

namespace App\Pages\Presentation\Http\Controllers;

use App\Domains\Pages\Contracts\Services\SitePagesServiceContract;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class PostsController extends Controller
{
    public function __construct(private readonly SitePagesServiceContract $service)
    {
    }

    public function __invoke(): View
    {
        return $this->service->posts();
    }
}

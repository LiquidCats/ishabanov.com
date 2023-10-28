<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use function view;

class TagCreateController extends Controller
{
    public function __construct()
    {
    }

    public function __invoke(Request $request): View
    {
        return view('admin.pages.tags.create');
    }
}

<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

use function view;

class FilesCreateController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.pages.files.create');
    }
}

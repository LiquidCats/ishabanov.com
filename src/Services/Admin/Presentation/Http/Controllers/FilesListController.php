<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers;

use App\Data\Database\Eloquent\Models\File;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

use function view;

class FilesListController extends Controller
{
    public function __invoke(): View
    {
        $files = File::query()->paginate();

        return view('admin.pages.files.list')
            ->with('files', $files);
    }
}

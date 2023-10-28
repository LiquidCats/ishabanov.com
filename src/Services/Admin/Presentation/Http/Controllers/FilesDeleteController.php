<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers;

use App\Data\Database\Eloquent\Models\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

use function redirect;
use function route;

class FilesDeleteController extends Controller
{
    public function __invoke(Request $request, string $fileId): RedirectResponse
    {
        /** @var File $file */
        $file = File::query()->findOrFail($fileId);

        $disk = Storage::disk('public');
        if ($disk->delete($file->path)) {
            $file->delete();
        }

        return redirect(route('admin.files.list'));
    }
}

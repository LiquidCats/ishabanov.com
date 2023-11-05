<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Files;

use App\Data\Database\Eloquent\Models\File;
use App\Domains\Files\Contracts\Services\FileServiceContract;
use App\Domains\Files\ValueObjects\FileId;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use function redirect;
use function route;

class FilesDeleteController extends Controller
{
    public function __construct(readonly private FileServiceContract $fileService)
    {
    }

    public function __invoke(Request $request, string $fileId): RedirectResponse
    {
        $this->fileService->drop(new FileId($fileId));

        return redirect(route('admin.files.list'));
    }
}

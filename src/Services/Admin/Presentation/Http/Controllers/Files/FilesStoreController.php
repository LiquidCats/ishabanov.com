<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Files;

use App\Admin\Presentation\Http\Requests\FileStoreRequest;
use App\Domains\Files\Contracts\Services\FileServiceContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use function redirect;
use function route;

class FilesStoreController extends Controller
{
    public function __construct(readonly FileServiceContract $fileService)
    {
    }

    public function __invoke(FileStoreRequest $request): RedirectResponse
    {
        $file = $request->file('file');
        $name = $request->validated('name');

        if ($this->fileService->store($file, $name) === null) {
            return redirect('admin.files.store')
                ->withInput()
                ->withErrors(['file' => ['Unable to upload file']]);
        }

        return redirect(route('admin.files.create'));
    }
}

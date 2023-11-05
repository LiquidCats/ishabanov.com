<?php

declare(strict_types=1);

namespace App\Admin\Application\Services;

use App\Domains\Files\Contracts\Repositories\FileRepositoryContract;
use App\Domains\Kernel\Contracts\Services\PageComposerServiceContract;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use function view;

class FilesListViewService implements PageComposerServiceContract
{
    public function __construct(private readonly FileRepositoryContract $fileRepository)
    {
    }

    public function view(Request $request): View
    {
        $filesPaginator = $this->fileRepository->getAllPaginated();

        return view('admin.pages.files.list')
            ->with('files', $filesPaginator);
    }
}

<?php

declare(strict_types=1);

namespace App\Admin\Application\Services;

use App\Domains\Files\Contracts\Repositories\FileRepositoryContract;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use function view;

class FilesPageComposer extends AbstractPageComposer
{
    public function __construct(
        private readonly FileRepositoryContract $fileRepository,
        Factory $factory,
        Repository $config
    ) {
        parent::__construct($factory, $config);
    }

    public function list(): View
    {
        $filesPaginator = $this->fileRepository->getAllPaginated();

        return $this->compose('files.list', [
            'files' => $filesPaginator,
        ]);
    }

    public function create(): View
    {
        return view('admin.pages.files.create');
    }
}

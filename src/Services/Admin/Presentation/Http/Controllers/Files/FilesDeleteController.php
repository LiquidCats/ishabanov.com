<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Files;

use App\Admin\Presentation\Http\Resources\FileResource;
use App\Domains\Files\Contracts\Services\FileServiceContract;
use App\Domains\Files\ValueObjects\FileId;
use Illuminate\Routing\Controller;

class FilesDeleteController extends Controller
{
    public function __construct(readonly private FileServiceContract $fileService)
    {
    }

    public function __invoke(string $fileId): FileResource
    {
        $file = $this->fileService->drop(new FileId($fileId));

        return FileResource::make($file);
    }
}

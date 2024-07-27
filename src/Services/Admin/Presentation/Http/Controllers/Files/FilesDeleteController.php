<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Files;

use App\Admin\Presentation\Http\Resources\FileResource;
use App\Domains\Files\Contracts\Services\FileServiceContract;
use App\Domains\Files\ValueObjects\FileId;
use App\Foundation\Context\Context;
use Illuminate\Routing\Controller;

class FilesDeleteController extends Controller
{
    public function __construct(
        readonly private Context $context,
        readonly private FileServiceContract $fileService
    ) {
    }

    public function __invoke(string $fileId): FileResource
    {
        $fileId = $this->context->resolve(FileId::class);
        $file = $this->fileService->drop($fileId);

        return FileResource::make($file);
    }
}

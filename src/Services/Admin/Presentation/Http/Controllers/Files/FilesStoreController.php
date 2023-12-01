<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Files;

use App\Admin\Presentation\Http\Requests\FileStoreRequest;
use App\Admin\Presentation\Http\Resources\FileResource;
use App\Domains\Files\Contracts\Services\FileServiceContract;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;

class FilesStoreController extends Controller
{
    public function __construct(readonly FileServiceContract $fileService)
    {
    }

    public function __invoke(FileStoreRequest $request): AnonymousResourceCollection
    {
        $data = $request->validated('list');

        $model = $this->fileService->storeMany($data);

        return FileResource::collection($model);
    }
}

<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Files;

use App\Admin\Presentation\Http\Requests\FileStoreRequest;
use App\Admin\Presentation\Http\Resources\FileResource;
use App\Domains\Files\Contracts\Services\FileServiceContract;
use App\Foundation\Enums\Response\Status;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class FilesStoreController extends Controller
{
    public function __construct(readonly FileServiceContract $fileService)
    {
    }

    public function __invoke(FileStoreRequest $request): JsonResponse|FileResource
    {
        $file = $request->file('file');
        $name = $request->validated('name');

        $model = $this->fileService->store($file, $name);
        if ($model === null) {
            return new JsonResponse([
                'status' => Status::FAIL,
                'message' => 'File was not created',
            ], 400);
        }

        return FileResource::make($model);
    }
}

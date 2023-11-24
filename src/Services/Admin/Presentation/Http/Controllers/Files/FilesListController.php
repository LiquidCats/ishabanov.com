<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Files;

use App\Admin\Presentation\Http\Resources\FileResource;
use App\Domains\Files\Contracts\Services\FileServiceContract;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;

class FilesListController extends Controller
{
    public function __construct(private readonly FileServiceContract $service)
    {
    }

    public function __invoke(): AnonymousResourceCollection
    {
        $files = $this->service->paginate();

        return FileResource::collection($files);
    }
}

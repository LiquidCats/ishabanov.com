<?php

declare(strict_types=1);

namespace App\Admin\Application\Services;

use App\Data\Database\Eloquent\Models\FileModel;
use App\Domains\Files\Contracts\Repositories\FileRepositoryContract;
use App\Domains\Files\Contracts\Repositories\StorageRepositoryContract;
use App\Domains\Files\Contracts\Services\FileServiceContract;
use App\Domains\Files\ValueObjects\FileId;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

use function asset;

readonly class FileService implements FileServiceContract
{
    public function __construct(
        private StorageRepositoryContract $storageRepository,
        private FileRepositoryContract $fileRepository,
    ) {
    }

    public function store(UploadedFile $file, string $name): ?FileModel
    {
        if ($filepath = $this->storageRepository->store($file)) {
            return $this->fileRepository->create($file, $filepath, $name);
        }

        return null;
    }

    public function drop(FileId $fileId): bool
    {
        $file = $this->fileRepository->findById($fileId);

        if ($this->fileRepository->removeById($fileId)) {
            return $this->storageRepository->drop($file->path);
        }

        return false;
    }

    public function paginate(): LengthAwarePaginator
    {
        return $this->fileRepository->getAllPaginated();
    }

    public function getImages(): Collection
    {
        return $this->fileRepository->getAllImages();
    }
}

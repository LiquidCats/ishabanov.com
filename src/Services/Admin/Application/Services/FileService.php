<?php

declare(strict_types=1);

namespace App\Admin\Application\Services;

use App\Data\Database\Eloquent\Models\File;
use App\Domains\Files\Contracts\Repositories\FileRepositoryContract;
use App\Domains\Files\Contracts\Repositories\StorageRepositoryContract;
use App\Domains\Files\Contracts\Services\FileServiceContract;
use App\Domains\Files\ValueObjects\FileId;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

readonly class FileService implements FileServiceContract
{
    public function __construct(
        private StorageRepositoryContract $storageRepository,
        private FileRepositoryContract $fileRepository,
    ) {
    }

    public function store(UploadedFile $file, string $name): ?File
    {
        if ($filepath = $this->storageRepository->store($file)) {
            return $this->fileRepository->create($file, $filepath, $name);
        }

        return null;
    }

    public function drop(FileId $fileId): bool
    {
        $file = $this->fileRepository->findById($fileId);

        if ($this->storageRepository->drop($file->path)) {
            $this->fileRepository->findById($fileId);

            return true;
        }

        return false;
    }
}

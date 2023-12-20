<?php

declare(strict_types=1);

namespace App\Admin\Application\Services;

use App\Data\Database\Eloquent\Models\FileModel;
use App\Domains\Files\Contracts\Repositories\FileRepositoryContract;
use App\Domains\Files\Contracts\Repositories\UploadedFilesStorageContract;
use App\Domains\Files\Contracts\Services\FileServiceContract;
use App\Domains\Files\Enums\FilterTypes;
use App\Domains\Files\ValueObjects\FileId;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

readonly class FileService implements FileServiceContract
{
    public function __construct(
        private UploadedFilesStorageContract $storageRepository,
        private FileRepositoryContract $fileRepository,
    ) {
    }

    public function storeMany(array $data = []): Collection
    {
        /** @var Collection<int, FileModel> $processedFiles */
        $processedFiles = Collection::make();

        /** @var array{name: string, file: UploadedFile} $item */
        foreach ($data as $item) {
            /** @var UploadedFile $uploadedFile */
            $uploadedFile = $item['file'];

            if ($this->fileRepository->isUploaded($uploadedFile)) {
                continue;
            }
            if ($this->storageRepository->upload($item['file'])) {
                $file = $this->fileRepository->create($item['name'], $item['file']);
                $processedFiles->push($file);
            }
        }

        return $processedFiles;
    }

    public function drop(FileId $fileId): FileModel
    {
        $file = $this->fileRepository->findById($fileId);

        if ($this->fileRepository->removeById($fileId)) {
            $this->storageRepository->drop($file);
        }

        return $file;
    }

    public function list(?FilterTypes $type = null): LengthAwarePaginator|Collection
    {
        return match ($type) {
            FilterTypes::IMAGES => $this->fileRepository->getAllImages(),
            default => $this->fileRepository->getAllPaginated(),
        };

    }
}

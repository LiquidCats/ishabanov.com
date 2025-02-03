<?php

declare(strict_types=1);

namespace App\Domains\Files\Services;

use App\Data\Database\Eloquent\Models\FileModel;
use App\Domains\Files\Contracts\Repositories\UploadedFilesStorageContract;
use App\Domains\Files\Contracts\Services\FileServiceContract;
use App\Domains\Files\Enums\AllowedTypes;
use App\Domains\Files\Enums\FilterTypes;
use App\Domains\Files\ValueObjects\FileId;
use App\Domains\User\ValueObjets\UserId;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

use function sha1_file;

readonly class FileService implements FileServiceContract
{
    public function __construct(
        private UploadedFilesStorageContract $storageRepository,
    ) {}

    public function storeMany(array $data = []): Collection
    {
        /** @var Collection<int, FileModel> $processedFiles */
        $processedFiles = Collection::make();

        /** @var array{name: string, file: UploadedFile} $item */
        foreach ($data as $item) {
            /** @var UploadedFile $uploadedFile */
            $uploadedFile = $item['file'];

            if ($this->isUploaded($uploadedFile)) {
                $file = FileModel::query()->findOrFail(new FileId(sha1_file($uploadedFile->path())));
                $processedFiles->push($file);

                continue;
            }

            if ($this->storageRepository->upload($item['file'])) {
                $file = $this->create($item['name'], $item['file']);
                $processedFiles->push($file);
            }
        }

        return $processedFiles;
    }

    public function drop(FileId $fileId): FileModel
    {
        /** @var FileModel $file */
        $file = FileModel::query()->findOrFail($fileId);

        if ($file->delete()) {
            $this->storageRepository->drop($file->path);
        }

        return $file;
    }

    public function list(?FilterTypes $type = null): LengthAwarePaginator|Collection
    {
        return match ($type) {
            FilterTypes::IMAGES => FileModel::query()
                ->whereIn('type', AllowedTypes::images())
                ->get(),
            default => FileModel::query()
                ->paginate(),
        };

    }

    private function create(string $filename, UploadedFile $uploadedFile): FileModel
    {
        $model = new FileModel;

        $model->hash = new FileId(sha1_file($uploadedFile->path()));
        $model->type = $uploadedFile->getMimeType();
        $model->path = $uploadedFile->hashName();
        $model->file_size = $uploadedFile->getSize();
        $model->extension = $uploadedFile->getClientOriginalExtension();
        $model->name = $filename;
        $model->created_by = new UserId(Auth::id());

        $model->save();

        return $model;
    }


    public function isUploaded(UploadedFile $uploadedFile): bool
    {
        return FileModel::query()
            ->where('hash', sha1_file($uploadedFile->path()))
            ->exists();
    }
}

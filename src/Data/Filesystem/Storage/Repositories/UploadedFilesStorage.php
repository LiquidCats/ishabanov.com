<?php

declare(strict_types=1);

namespace App\Data\Filesystem\Storage\Repositories;

use const DIRECTORY_SEPARATOR;

use App\Data\Database\Eloquent\Models\FileModel;
use App\Domains\Files\Contracts\Repositories\UploadedFilesStorageContract;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

readonly class UploadedFilesStorage implements UploadedFilesStorageContract
{
    public function __construct(private Filesystem $filesystem)
    {
    }

    /**
     * Uploads a file to the specified path.
     *
     * @param  UploadedFile  $file The file to upload.
     * @return bool Returns true if the file was successfully uploaded, false otherwise.
     */
    public function upload(UploadedFile $file): bool
    {
        return (bool) $this->filesystem
            ->put(self::PATH, $file);
    }

    public function drop(FileModel $file): bool
    {
        $pathToFile = Str::startsWith($file->path, self::PATH.DIRECTORY_SEPARATOR)
            ? $file->path
            : self::PATH.DIRECTORY_SEPARATOR.$file->path;

        return $this->filesystem
            ->delete($pathToFile);
    }
}

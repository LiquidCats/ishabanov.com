<?php

declare(strict_types=1);

namespace App\Data\Filesystem\Storage\Repositories;

use const DIRECTORY_SEPARATOR;

use App\Data\Filesystem\Storage\Options;
use App\Domains\Files\Contracts\Repositories\UploadedFilesStorageContract;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

readonly class UploadedFilesStorage implements UploadedFilesStorageContract
{
    public function __construct(private Filesystem $filesystem, private Options $options)
    {
    }

    public function url(string $file): string
    {
        return $this->filesystem
            ->url($this->fixLegacyPath($file));
    }

    /**
     * Uploads a file to the specified path.
     *
     * @param  UploadedFile  $file  The file to upload.
     * @return bool Returns true if the file was successfully uploaded, false otherwise.
     */
    public function upload(UploadedFile $file): bool
    {
        return (bool) $this->filesystem->put($this->options->prepend.DIRECTORY_SEPARATOR.$this->options->path, $file);
    }

    public function drop(string $file): bool
    {
        return $this->filesystem
            ->delete($this->fixLegacyPath($file));
    }

    private function fixLegacyPath(string $path): string
    {
        return Str::startsWith($path, $this->options->path.DIRECTORY_SEPARATOR)
            ? $this->options->prepend.DIRECTORY_SEPARATOR.$path
            : $this->options->prepend.DIRECTORY_SEPARATOR.$this->options->path.DIRECTORY_SEPARATOR.$path;
    }
}

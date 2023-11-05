<?php

declare(strict_types=1);

namespace App\Data\Filesystem\Storage\Repositories;

use App\Domains\Files\Contracts\Repositories\StorageRepositoryContract;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class StorageRepository implements StorageRepositoryContract
{
    public const PATH = 'media';

    public function __construct(readonly private Filesystem $filesystem)
    {
    }


    public function store(UploadedFile $file): string|false
    {
        return $file->store(self::PATH, ['disk' => 'public']);
    }

    public function drop(string $filepath): bool
    {
        return $this->filesystem->delete($filepath);
    }
}

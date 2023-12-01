<?php

declare(strict_types=1);

namespace App\Domains\Files\Contracts\Repositories;

use App\Data\Database\Eloquent\Models\FileModel;
use Illuminate\Http\UploadedFile;

interface UploadedFilesStorageContract
{
    public const PATH = 'media';

    public function upload(UploadedFile $file): bool;
    public function drop(FileModel $file): bool;
}

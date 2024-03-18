<?php

declare(strict_types=1);

namespace App\Domains\Files\Contracts\Repositories;

use Illuminate\Http\UploadedFile;

interface UploadedFilesStorageContract
{
    public function url(string $file): string;

    public function upload(UploadedFile $file): bool;

    public function drop(string $file): bool;
}

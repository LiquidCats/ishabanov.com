<?php

declare(strict_types=1);

namespace App\Domains\Files\Contracts\Repositories;

use Illuminate\Http\UploadedFile;

interface StorageRepositoryContract
{
    public function store(UploadedFile $file): string|false;
    public function drop(string $filepath): bool;
}

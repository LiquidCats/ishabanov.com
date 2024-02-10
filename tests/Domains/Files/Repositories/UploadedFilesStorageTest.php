<?php

declare(strict_types=1);

namespace Tests\Domains\Files\Repositories;

use App\Data\Database\Eloquent\Models\FileModel;
use App\Domains\Files\Contracts\Repositories\UploadedFilesStorageContract;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UploadedFilesStorageTest extends TestCase
{
    public function test_upload_returns_true_on_success(): void
    {
        $storage = Storage::fake('public');

        /** @var UploadedFilesStorageContract $repo */
        $repo = $this->app->make(UploadedFilesStorageContract::class);

        $file = UploadedFile::fake()->image('test.jpg');

        $result = $repo->upload($file);

        $files = $storage->files(UploadedFilesStorageContract::PATH);

        $this->assertTrue($result);
        $this->assertNotEmpty($files);
        $this->assertCount(1, $files);
    }
    public function test_drop_returns_true_on_success(): void
    {
        $storage = Storage::fake('public');

        /** @var UploadedFilesStorageContract $repo */
        $repo = $this->app->make(UploadedFilesStorageContract::class);

        $file = UploadedFile::fake()->image('test.jpg');
        $storage->put(UploadedFilesStorageContract::PATH, $file);

        $dto = new FileModel();
        $dto->path = $file->hashName();
        $result = $repo->drop($dto);

        $files = $storage->files(UploadedFilesStorageContract::PATH);

        $this->assertTrue($result);
        $this->assertEmpty($files);
        $this->assertCount(0, $files);
    }
}

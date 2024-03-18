<?php

declare(strict_types=1);

namespace Tests\Feature\Services\Admin;

use App\Data\Database\Eloquent\Models\FileModel;
use App\Data\Database\Eloquent\Models\UserModel;
use App\Domains\Files\Contracts\Repositories\UploadedFilesStorageContract;
use App\Domains\Files\ValueObjects\FileId;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use function env;
use function fake;
use function route;

class FileApiV1Test extends TestCase
{
    /** @var Collection<FileModel>> */
    protected Collection $files;

    protected UserModel $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = UserModel::factory()->create();

        FileModel::factory(20)->create();

        $this->files = FileModel::query()->get();

        $this->actingAs($this->user);
    }

    public function test_should_list_file(): void
    {
        $response = $this->getJson(route('admin.api.files.list'));

        $response->assertSuccessful();
        $response->assertJsonStructure([
            'data' => [
                [
                    'hash',
                    'type',
                    'path',
                    'extension',
                    'name',
                    'file_size',
                ],
            ],
        ]);
        $this->assertCount(15, $response->json('data'));
    }

    public function test_should_store_file(): void
    {
        $disk = Storage::fake();

        $data = [
            'list' => [
                [
                    'file' => UploadedFile::fake()->image('test.jpg'),
                    'name' => fake()->words(5, true),
                ],
                [
                    'file' => UploadedFile::fake()->image('test2.png'),
                    'name' => fake()->words(5, true),
                ],
            ],
        ];

        $response = $this->postJson(route('admin.api.files.store'), $data);

        $response->assertSuccessful();
        $response->assertJsonStructure([
            'data' => [
                [
                    'hash',
                    'type',
                    'path',
                    'extension',
                    'name',
                    'file_size',
                ],
            ],
        ]);

        $this->assertDatabaseMissing((new FileModel())->getTable(), [
            'hash' => $response->json('data.0.hash'),
        ]);
        $this->assertDatabaseMissing((new FileModel())->getTable(), [
            'hash' => $response->json('data.1.hash'),
        ]);

        $this->assertCount(2, $disk->files('ishabanov/testing/media'));
    }

    public function test_should_delete_file(): void
    {
        /** @var FileModel $file */
        $file = $this->files->random();

        $response = $this->deleteJson(route('admin.api.files.delete', [
            FileId::AS_KEY => $file->getKey(),
        ]));

        $response->assertSuccessful();

        $this->assertDatabaseMissing((new FileModel())->getTable(), [
            'hash' => $file->getKey(),
        ]);
    }
}

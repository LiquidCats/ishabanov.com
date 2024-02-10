<?php

declare(strict_types=1);

namespace Tests\Domains\Files\Services;

use App\Admin\Application\Services\FileService;
use App\Data\Database\Eloquent\Models\FileModel;
use App\Domains\Files\Enums\FilterTypes;
use App\Domains\Files\ValueObjects\FileId;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Testing\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use JetBrains\PhpStorm\ArrayShape;
use Tests\TestCase;
use ValueError;
use function count;
use function fake;
use function sha1_file;

/**
 * @coversDefaultClass \App\Admin\Application\Services\FileService
 */
class FileServiceTest extends TestCase
{
    /**
     * @covers ::storeMany
     *
     * @dataProvider fileDataProvider
     */
    public function testCanStoreSingleFile(array $data): void
    {
        $disk = Storage::fake('public');

        /** @var FileService $service */
        $service = $this->app->make(FileService::class);

        $service->storeMany($data);

        $this->assertCount(count($data), $disk->files('media'));

        $this->assertDatabaseCount('files', count($data));
        foreach ($data as $item) {
            $this->assertDatabaseHas('files', [
                'name' => $item['name'],
            ]);
        }
    }

    /**
     * @covers ::storeMany
     */
    public function testDoNotLooseFileWhileSaveError(): void
    {
        $this->expectException(ValueError::class);

        $disk = Storage::fake('public');

        /** @var FileService $service */
        $service = $this->app->make(FileService::class);

        $data = [self::createFileData()];

        $service->storeMany($data);

        $this->assertCount(count($data), $disk->files('media'));
    }

    /**
     * @covers ::drop
     */
    public function testCanDropFile(): void
    {
        $disk = Storage::fake('public');

        /** @var FileService $service */
        $service = $this->app->make(FileService::class);

        $image = self::createImageData();
        $disk->put('media', $image['file']);

        $fileId = new FileId(sha1_file($image['file']->getRealPath()));

        (new FileModel())->create($image['name'], $image['file']);

        $service->drop($fileId);

        $this->assertDatabaseCount('files', 0);
        $this->assertCount(0, $disk->files('media'));
    }

    /**
     * @covers ::list
     *
     * @dataProvider fileDataProvider
     */
    public function testCanListFiles(array $data): void
    {
        $disk = Storage::fake('public');

        /** @var FileService $service */
        $service = $this->app->make(FileService::class);

        foreach ($data as $item) {
            $disk->put('media', $item['file']);
            (new FileModel())->create($item['name'], $item['file']);
        }

        $list = $service->list();

        $this->assertInstanceOf(LengthAwarePaginator::class, $list);
        $this->assertCount(count($data), $list);

        $list = $service->list(FilterTypes::IMAGES);

        $this->assertInstanceOf(Collection::class, $list);
        $this->assertCount(count($data), $list);
    }

    public static function fileDataProvider(): array
    {
        return [
            'single image' => [
                [
                    self::createImageData(),
                ],
            ],
            'multiple image' => [
                [
                    self::createImageData(),
                    self::createImageData(),
                ],
            ],
        ];
    }

    /**
     * @return array{name: string, file: File}
     */
    #[ArrayShape(['name' => 'string', 'file' => File::class])]
    public static function createImageData(): array
    {
        return [
            'name' => 'DALL-E '.fake()->text(100),
            'file' => UploadedFile::fake()
                ->image(
                    fake()->randomNumber(8).'.jpg',
                    fake()->numberBetween(1, 30),
                    fake()->numberBetween(1, 30),
                ),
        ];
    }

    /**
     * @return array{name: string, file: File}
     */
    #[ArrayShape(['name' => 'string', 'file' => File::class])]
    public static function createFileData(): array
    {
        return [
            'name' => fake()->text(100),
            'file' => UploadedFile::fake()
                ->create(
                    fake()->randomNumber(8).'.txt'
                ),
        ];
    }
}

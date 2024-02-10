<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Data\Database\Eloquent\Models\FileModel;
use App\Domains\Files\Enums\AllowedTypes;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use function fake;
use function sha1;

/**
 * @extends Factory<FileModel>
 */
class FileFactory extends Factory
{
    protected $model = FileModel::class;

    public function definition(): array
    {
        return [
            'hash' => sha1(Str::random()),
            'type' => AllowedTypes::IMAGE_JPG,
            'path' => fake()->filePath(),
            'extension' => 'jpg',
            'name' => fake()->name,
            'file_size' => 10000,
        ];
    }
}

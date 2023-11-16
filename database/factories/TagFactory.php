<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Data\Database\Eloquent\Models\TagModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use function fake;

/**
 * @extends Factory<TagModel>
 */
class TagFactory extends Factory
{
    protected $model = TagModel::class;

    public function definition(): array
    {
        $name = fake()->words(asText: true);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}

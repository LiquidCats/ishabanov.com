<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Data\Database\Eloquent\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use function fake;

/**
 * @extends Factory<Tag>
 */
class TagFactory extends Factory
{
    protected $model = Tag::class;

    public function definition(): array
    {
        $name = fake()->words(asText: true);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}

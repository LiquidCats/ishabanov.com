<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Data\Database\Eloquent\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use function fake;
use function now;

class PostFactory extends Factory
{
    protected $model = Post::class;
    public function definition(): array
    {
        return [
            'title' => fake()->words(asText:  true),
            'content' => fake()->paragraph(),
            'author_id' => 1,
            'is_draft' => false,
            'published_at' => now()->subDay(),
        ];
    }
}

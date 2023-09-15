<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use ishabanov\Data\Database\Eloquent\Models\ExperienceTool;
use ishabanov\Foundation\Enums\ExperienceLevel;

/**
 * @extends Factory<ExperienceTool>
 */
class ExperienceToolFactory extends Factory
{
    protected $model = ExperienceTool::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'level_id' => fake()->randomElement(array_map(static fn (ExperienceLevel $l) => $l->value, ExperienceLevel::cases())),
        ];
    }
}

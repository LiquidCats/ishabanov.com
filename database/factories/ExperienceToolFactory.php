<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Data\Database\Eloquent\Models\ExperienceToolModel;
use App\Foundation\Enums\ExperienceLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ExperienceToolModel>
 */
class ExperienceToolFactory extends Factory
{
    protected $model = ExperienceToolModel::class;

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

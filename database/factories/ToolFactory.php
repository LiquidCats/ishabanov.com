<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Data\Enums\{ExperienceLevel, ToolType};
use App\Data\Models\Tool;
use Illuminate\Database\Eloquent\Factories\Factory;

use function array_map;
use function fake;

/**
 * @extends Factory<Tool>
 */
class ToolFactory extends Factory
{
    protected $model = Tool::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(2),
            'type' => fake()->randomElement(array_map(static fn (ToolType $t) => $t->value, ToolType::cases())),
            'level' => fake()->randomElement(array_map(static fn (ExperienceLevel $l) => $l->value, ExperienceLevel::cases())),
        ];
    }
}

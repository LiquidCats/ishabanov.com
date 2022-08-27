<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Data\Models\UserEmail;
use Illuminate\Database\Eloquent\Factories\Factory;

use function fake;

/**
 * @extends Factory<UserEmail>
 */
class UserEmailFactory extends Factory
{
    protected $model = UserEmail::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => fake()->safeEmail,
            'name' => fake()->firstName.' '.fake()->lastName,
            'subject' => fake()->numberBetween(int2: 3),
        ];
    }
}

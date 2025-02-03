<?php

namespace Database\Factories;

namespace Database\Factories;

use App\Data\Database\Eloquent\Models\UserModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use LiquidCats\G2FA\ValueObjects\SecretKey;

use function bcrypt;

/**
 * @extends Factory<UserModel>
 */
class UserFactory extends Factory
{
    protected $model = UserModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Ilya Shabanov',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // password
            'remember_token' => Str::random(10),
            'g2fa_secret' => new SecretKey('COPFCZVACQRRI763'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

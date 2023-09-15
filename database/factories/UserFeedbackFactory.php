<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use ishabanov\Data\Database\Eloquent\Models\UserFeedback;
use ishabanov\Foundation\Enums\FeedbackType;

use function fake;

/**
 * @extends Factory<UserFeedback>
 */
class UserFeedbackFactory extends Factory
{
    protected $model = UserFeedback::class;

    public function definition(): array
    {
        return [
            'email' => fake()->safeEmail(),
            'name' => fake()->firstName.' '.fake()->lastName(),
            'subject' => fake()->randomElement([
                FeedbackType::NO_SUBJECT,
                FeedbackType::CONSULTATION,
                FeedbackType::SERVICES,
                FeedbackType::PRICING,
            ]),
            'message' => fake()->text,
        ];
    }
}

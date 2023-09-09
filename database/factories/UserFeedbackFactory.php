<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use ishabanov\Core\Domain\Enums\FeedbackType;
use ishabanov\Core\Infrastructure\Eloquent\Models\UserFeedback;
use function fake;

/**
 * @extends Factory<UserFeedback>
 */
class UserFeedbackFactory extends Factory
{
    protected $model = UserFeedback::class;

    public function definition()
    {
        return [
            'email' => fake()->safeEmail(),
            'name' => fake()->firstName . ' ' .fake()->lastName(),
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

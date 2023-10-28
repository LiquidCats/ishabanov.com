<?php

namespace Tests\Unit\Domains\Feedback\Repositories;

use App\Data\Database\Eloquent\Models\UserFeedback;
use App\Domains\Feedback\Contracts\Repositories\UserFeedbackRepositoryContract;
use Tests\TestCase;

/**
 * @coversDefaultClass \App\Data\Database\Eloquent\Repositories\UserFeedbackRepository
 */
class UserFeedbackRepositoryTest extends TestCase
{
    /**
     * @test
     *
     * @covers ::save
     */
    public function shouldSaveUserFeedback(): void
    {
        /** @var UserFeedbackRepositoryContract $repo */
        $repo = $this->app->make(UserFeedbackRepositoryContract::class);

        $this->assertDatabaseCount((new UserFeedback())->getTable(), 0);

        $feedback = UserFeedback::factory()->make();

        $this->assertDatabaseCount((new UserFeedback())->getTable(), 0);

        $repo->save(
            email: $feedback->email,
            name: $feedback->name,
            message: $feedback->message
        );

        $this->assertDatabaseCount((new UserFeedback())->getTable(), 1);
    }
}

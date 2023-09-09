<?php

namespace Tests\Unit\Api\Domain\Repositories;

use ishabanov\Api\Domain\Contracts\Repositories\UserFeedbackRepositoryContract;
use ishabanov\Core\Infrastructure\Eloquent\Models\UserFeedback;
use Tests\TestCase;

/**
 * @coversDefaultClass \ishabanov\Api\Infrastructure\Repositories\Eloquent\Repositories\UserFeedbackRepository
 */
class UserFeedbackRepositoryTest extends TestCase
{
    /**
     * @test
     * @covers ::save
     *
     * @return void
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

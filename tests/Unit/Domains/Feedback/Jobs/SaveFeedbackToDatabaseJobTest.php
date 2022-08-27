<?php

namespace Tests\Unit\Domains\Feedback\Jobs;

use App\Data\Models\UserEmail;
use App\Domains\Feedback\Jobs\SaveFeedbackToDatabaseJob;

class SaveFeedbackToDatabaseJobTest extends AbstractFeedbackJobTest
{
    /**
     * @test
     *
     * @return void
     */
    public function should_collect_user_email(): void
    {
        $request = $this->mockRequest();

        $job = new SaveFeedbackToDatabaseJob($request);

        self::assertEquals(0, UserEmail::query()->count());

        $this->app->call([$job, 'handle']);

        self::assertEquals(1, UserEmail::query()->count());
    }
}

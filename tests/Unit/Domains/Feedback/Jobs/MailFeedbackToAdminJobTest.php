<?php

namespace Tests\Unit\Domains\Feedback\Jobs;

use App\Domains\Feedback\Jobs\MailFeedbackToAdminJob;
use App\Mail\FeedbackReceived;
use Illuminate\Support\Facades\Mail;

class MailFeedbackToAdminJobTest extends AbstractFeedbackJobTest
{
    /**
     * @test
     *
     * @return void
     */
    public function should_send_feedback_to_admin_email(): void
    {
        Mail::fake();

        $request = $this->mockRequest();

        $job = new MailFeedbackToAdminJob($request);

        $this->app->call([$job, 'handle']);

        Mail::assertSent(FeedbackReceived::class);
    }
}

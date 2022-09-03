<?php

namespace Tests\Unit\Domains\Feedback\Jobs;

use App\Domains\Feedback\Jobs\MailFeedbackToAdminJob;
use App\Mail\FeedbackReceived;
use Illuminate\Support\Facades\Mail;

class MailFeedbackToAdminJobTest extends AbstractFeedbackJobTest
{
    /**
     * @test
     */
    public function shouldSendFeedbackToAdminEmail(): void
    {
        Mail::fake();

        $request = $this->mockRequest();

        $job = new MailFeedbackToAdminJob($request);

        $this->app->call([$job, 'handle']);

        Mail::assertSent(FeedbackReceived::class);
    }
}

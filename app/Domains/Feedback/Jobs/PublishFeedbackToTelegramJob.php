<?php

declare(strict_types=1);

namespace App\Domains\Feedback\Jobs;

use Illuminate\Log\LogManager;
use ishabanov\Api\Presentation\Http\Requests\UserFeedbackRequest;
use ishabanov\Bot\Domain\Contracts\Services\FeedbackServiceContract;
use Lucid\Units\Job;

class PublishFeedbackToTelegramJob extends Job
{
    public function __construct(protected UserFeedbackRequest $request)
    {
    }

    public function handle(LogManager $log, FeedbackServiceContract $feedbackService): void
    {
        if (! $feedbackService->publishFeedback($this->request)) {
            $log->channel('feedback')
                ->error('feedback to telegram failed', $this->request->validated());
        }
    }
}

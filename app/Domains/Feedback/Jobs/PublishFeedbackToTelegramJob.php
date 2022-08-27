<?php

declare(strict_types=1);

namespace App\Domains\Feedback\Jobs;

use App\Domains\Feedback\Contracts\Services\FeedbackServiceContract;
use App\Http\Requests\UserFeedbackRequest;
use Illuminate\Log\LogManager;
use Lucid\Units\Job;

class PublishFeedbackToTelegramJob extends Job
{
    public function __construct(protected UserFeedbackRequest $request)
    {
    }

    public function handle(LogManager $log, FeedbackServiceContract $feedbackService): void
    {
        if (!$feedbackService->publish($this->request)) {
            $log->channel('feedback')
                ->error('feedback to telegram failed', $this->request->validated());
        }
    }
}

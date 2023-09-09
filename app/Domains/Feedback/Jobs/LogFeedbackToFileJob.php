<?php

declare(strict_types=1);

namespace App\Domains\Feedback\Jobs;

use Illuminate\Log\LogManager;
use ishabanov\Api\Presentation\Http\Requests\UserFeedbackRequest;
use Lucid\Units\Job;

class LogFeedbackToFileJob extends Job
{
    public function __construct(protected UserFeedbackRequest $request)
    {
    }

    public function handle(LogManager $log): void
    {
        $log->channel('feedback')
            ->notice('feedback message received', $this->request->validated());
    }
}

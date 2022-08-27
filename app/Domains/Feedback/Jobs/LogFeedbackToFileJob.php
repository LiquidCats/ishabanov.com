<?php

declare(strict_types=1);

namespace App\Domains\Feedback\Jobs;

use App\Http\Requests\UserFeedbackRequest;
use Illuminate\Log\LogManager;
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

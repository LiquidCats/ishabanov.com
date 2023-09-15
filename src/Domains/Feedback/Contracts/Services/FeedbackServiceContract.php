<?php

namespace App\Domains\Feedback\Contracts\Services;

use App\Api\Presentation\Http\Requests\UserFeedbackRequest;

interface FeedbackServiceContract
{
    public function handleFeedback(UserFeedbackRequest $request): void;
}

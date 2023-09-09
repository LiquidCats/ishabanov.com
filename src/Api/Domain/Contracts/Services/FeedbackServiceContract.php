<?php

namespace ishabanov\Api\Domain\Contracts\Services;

use ishabanov\Api\Presentation\Http\Requests\UserFeedbackRequest;

interface FeedbackServiceContract
{
    public function handleFeedback(UserFeedbackRequest $request): void;
}

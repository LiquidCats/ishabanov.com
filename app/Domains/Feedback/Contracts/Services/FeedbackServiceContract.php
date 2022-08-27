<?php

declare(strict_types=1);

namespace App\Domains\Feedback\Contracts\Services;

use App\Http\Requests\UserFeedbackRequest;

interface FeedbackServiceContract
{
    public function publish(UserFeedbackRequest $request): bool;
}

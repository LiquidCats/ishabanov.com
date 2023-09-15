<?php

declare(strict_types=1);

namespace App\Api\Presentation\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use App\Api\Presentation\Http\Requests\UserFeedbackRequest;
use App\Domains\Feedback\Contracts\Services\FeedbackServiceContract;
use App\Foundation\Enums\Response\Status;

class UserFeedbackController extends Controller
{
    public function __construct(
        private readonly FeedbackServiceContract $feedbackService
    ) {
    }

    public function __invoke(UserFeedbackRequest $request): JsonResponse
    {
        $this->feedbackService->handleFeedback($request);

        return new JsonResponse([
            'status' => Status::SUCCESS,
        ]);
    }
}

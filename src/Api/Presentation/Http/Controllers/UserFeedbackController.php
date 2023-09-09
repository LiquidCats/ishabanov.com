<?php

declare(strict_types=1);

namespace ishabanov\Api\Presentation\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use ishabanov\Api\Domain\Contracts\Services\FeedbackServiceContract;
use ishabanov\Api\Presentation\Http\Requests\UserFeedbackRequest;
use ishabanov\Core\Domain\Enums\Response\Status;

class UserFeedbackController extends Controller
{
    public function __construct(
        private readonly FeedbackServiceContract $feedbackService
    ) {
    }

    public function __invoke(UserFeedbackRequest $request): JsonResponse
    {
        $this->feedbackService->handleFeedback($request);;

        return new JsonResponse([
            'status' => Status::SUCCESS,
        ]);
    }
}

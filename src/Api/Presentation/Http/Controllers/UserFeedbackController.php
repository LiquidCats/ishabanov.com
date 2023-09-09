<?php

declare(strict_types=1);

namespace ishabanov\Api\Presentation\Http\Controllers;

use App\Features\Feedback\UserFeedbackFeature;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use ishabanov\Core\Domain\Enums\Response\Status;

class UserFeedbackController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return new JsonResponse([
            'status' => Status::SUCCESS
        ]);
    }
}

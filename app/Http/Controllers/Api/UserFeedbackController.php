<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Features\Feedback\UserFeedbackFeature;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class UserFeedbackController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return $this->serve(UserFeedbackFeature::class);
    }
}

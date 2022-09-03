<?php

declare(strict_types=1);

namespace App\Features\Feedback;

use App\Domains\Feedback\Jobs\{
    LogFeedbackToFileJob,
    MailFeedbackToAdminJob,
    PublishFeedbackToTelegramJob,
    SaveFeedbackToDatabaseJob
};
use App\Http\Requests\UserFeedbackRequest;
use Illuminate\Http\JsonResponse;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class UserFeedbackFeature extends Feature
{
    public function handle(UserFeedbackRequest $request): JsonResponse
    {
        $this->run(new SaveFeedbackToDatabaseJob($request));
        $this->run(new LogFeedbackToFileJob($request));
        $this->run(new PublishFeedbackToTelegramJob($request));
        $this->run(new MailFeedbackToAdminJob($request));

        return $this->run(new RespondWithJsonJob([
            'ok' => true,
        ]));
    }
}

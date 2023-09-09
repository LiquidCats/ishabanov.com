<?php

declare(strict_types=1);

namespace App\Domains\Feedback\Jobs;

use App\Data\Models\UserEmail;
use ishabanov\Api\Presentation\Http\Requests\UserFeedbackRequest;
use ishabanov\Core\Domain\Enums\FeedbackType;
use Lucid\Units\Job;

class SaveFeedbackToDatabaseJob extends Job
{
    public function __construct(protected UserFeedbackRequest $request)
    {
    }

    public function handle(): void
    {
        $email = $this->request->validated('email');

        if (UserEmail::query()->whereKey($email)->doesntExist()) {
            $model = new UserEmail();

            $model->email = $this->request->validated('email');
            $model->name = $this->request->validated('name');
            $model->subject = FeedbackType::NO_SUBJECT;

            $model->save();
        }
    }
}

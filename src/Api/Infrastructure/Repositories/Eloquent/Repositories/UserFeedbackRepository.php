<?php

namespace ishabanov\Api\Infrastructure\Repositories\Eloquent\Repositories;

use ishabanov\Api\Domain\Contracts\Repositories\UserFeedbackRepositoryContract;
use ishabanov\Core\Domain\Enums\FeedbackType;
use ishabanov\Core\Infrastructure\Eloquent\Models\UserFeedback;

class UserFeedbackRepository implements UserFeedbackRepositoryContract
{
    public function save(string $email, string $name, string $message): UserFeedback
    {
        $model = new UserFeedback();

        $model->email = $email;
        $model->name = $name;
        $model->subject = FeedbackType::NO_SUBJECT;
        $model->message = $message;

        $model->save();

        return $model;
    }
}

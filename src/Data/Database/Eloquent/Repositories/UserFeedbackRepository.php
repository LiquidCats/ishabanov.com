<?php

namespace App\Data\Database\Eloquent\Repositories;

use App\Data\Database\Eloquent\Models\UserFeedback;
use App\Domains\Feedback\Contracts\Repositories\UserFeedbackRepositoryContract;
use App\Foundation\Enums\FeedbackType;

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

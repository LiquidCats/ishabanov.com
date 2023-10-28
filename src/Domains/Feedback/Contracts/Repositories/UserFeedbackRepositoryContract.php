<?php

namespace App\Domains\Feedback\Contracts\Repositories;

use App\Data\Database\Eloquent\Models\UserFeedback;

interface UserFeedbackRepositoryContract
{
    public function save(string $email, string $name, string $message): UserFeedback;
}

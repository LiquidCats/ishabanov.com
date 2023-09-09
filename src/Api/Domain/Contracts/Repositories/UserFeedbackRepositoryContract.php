<?php

namespace ishabanov\Api\Domain\Contracts\Repositories;

use ishabanov\Core\Infrastructure\Eloquent\Models\UserFeedback;

interface UserFeedbackRepositoryContract
{
    public function save(string $email, string $name, string $message): UserFeedback;
}

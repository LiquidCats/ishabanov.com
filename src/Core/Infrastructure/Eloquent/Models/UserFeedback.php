<?php

namespace ishabanov\Core\Infrastructure\Eloquent\Models;

use Database\Factories\ToolFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ishabanov\Core\Domain\Enums\FeedbackType;

/**
 * @property string $email
 * @property string $name
 * @property FeedbackType $subject
 * @property string $message
 */
class UserFeedback extends Model
{
    use HasFactory;


    protected $casts = [
        'email' => 'string',
        'name' => 'string',
        'subject' => FeedbackType::class,
        'message' => 'string',
    ];

    protected static function newFactory(): ToolFactory
    {
        return UserFeedback::new();
    }
}

<?php

namespace App\Data\Database\Eloquent\Models;

use App\Foundation\Enums\FeedbackType;
use Database\Factories\UserFeedbackFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    protected static function newFactory(): UserFeedbackFactory
    {
        return UserFeedbackFactory::new();
    }
}

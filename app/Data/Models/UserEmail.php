<?php

declare(strict_types=1);

namespace App\Data\Models;

use App\Data\Enums\FeedbackType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $email
 * @property string $name
 * @property int $subject
 */
class UserEmail extends Model
{
    use HasFactory;

    protected $primaryKey = 'email';

    protected $keyType = 'string';

    protected $casts = [
        'email' => 'string',
        'name' => 'string',
        'subject' => FeedbackType::class,
    ];
}

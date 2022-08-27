<?php

declare(strict_types=1);

namespace App\Data\Models;

use App\Data\Enums\ToolType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tool.
 *
 * @property int         $id
 * @property string      $name
 * @property string|null $type
 * @property string|null $level
 */
class Tool extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $casts = [
        'name' => 'string',
        'type' => ToolType::class,
    ];
}

<?php

declare(strict_types=1);

namespace App\Data\Models;

use App\Data\Enums\{ExperienceLevel, ToolType};
use Database\Factories\ToolFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tool.
 *
 * @property int                  $id
 * @property string               $name
 * @property ToolType|null        $type
 * @property ExperienceLevel|null $level
 */
class Tool extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $casts = [
        'name' => 'string',
        'type' => ToolType::class,
        'level' => ExperienceLevel::class,
    ];

    protected static function newFactory(): ToolFactory
    {
        return ToolFactory::new();
    }
}

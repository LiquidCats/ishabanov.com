<?php

declare(strict_types=1);

namespace App\Data\Database\Eloquent\Models;

use App\Foundation\Enums\ExperienceLevel;
use App\Foundation\Enums\ToolType;
use Database\Factories\ToolFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tool.
 *
 * @property int $id
 * @property string $name
 * @property ToolType|null $type
 * @property ExperienceLevel|null $level
 */
class ToolModel extends Model
{
    use HasFactory;

    protected $table = 'tools';

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

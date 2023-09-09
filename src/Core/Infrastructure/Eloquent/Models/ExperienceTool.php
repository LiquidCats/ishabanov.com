<?php

declare(strict_types=1);

namespace ishabanov\Core\Infrastructure\Eloquent\Models;

use Database\Factories\ExperienceToolFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use ishabanov\Core\Domain\Enums\ExperienceLevel;

/**
 * @property int             $experience_id
 * @property string          $tool_id
 * @property ExperienceLevel $level_id
 */
class ExperienceTool extends Pivot
{
    use HasFactory;

    protected $casts = [
        'experience_id' => 'int',
        'tool_id' => 'int',
        'level_id' => ExperienceLevel::class,
    ];

    public $timestamps = null;

    protected $dates = [];

    protected static function newFactory(): ExperienceToolFactory
    {
        return ExperienceToolFactory::new();
    }
}

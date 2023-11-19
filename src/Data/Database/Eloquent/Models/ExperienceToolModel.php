<?php

declare(strict_types=1);

namespace App\Data\Database\Eloquent\Models;

use App\Foundation\Enums\ExperienceLevel;
use Database\Factories\ExperienceToolFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @property int             $experience_id
 * @property string          $tool_id
 * @property ExperienceLevel $level_id
 */
class ExperienceToolModel extends Pivot
{
    use HasFactory;

    protected $table = 'experience_tool';

    protected $casts = [
        'experience_id' => 'int',
        'tool_id' => 'int',
        'level_id' => ExperienceLevel::class,
    ];

    public $timestamps = null;

    protected array $dates = [];

    protected static function newFactory(): ExperienceToolFactory
    {
        return ExperienceToolFactory::new();
    }
}

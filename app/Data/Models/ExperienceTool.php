<?php

declare(strict_types=1);

namespace App\Data\Models;

use App\Data\Enums\ExperienceLevel;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ExperienceTool extends Pivot
{
    protected $casts = [
        'experience_id' => 'int',
        'tool_id' => 'int',
        'level_id' => ExperienceLevel::class,
    ];
}

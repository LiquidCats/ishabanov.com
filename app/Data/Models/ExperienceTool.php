<?php

declare(strict_types=1);

namespace App\Data\Models;

use App\Data\Enums\ExperienceLevel;
use Database\Factories\ExperienceToolFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ExperienceTool extends Pivot
{
    use HasFactory;

    protected $casts = [
        'experience_id' => 'int',
        'tool_id' => 'int',
        'level_id' => ExperienceLevel::class,
    ];

    protected static function newFactory(): ExperienceToolFactory
    {
        return ExperienceToolFactory::new();
    }
}

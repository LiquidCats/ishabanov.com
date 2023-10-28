<?php

declare(strict_types=1);

namespace App\Data\Database\Eloquent\Models;

use Carbon\Carbon;
use Database\Factories\ExperienceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Experience.
 *
 * @property int         $id
 * @property string      $company_name
 * @property string      $company_url
 * @property string      $company_logo
 * @property string      $position
 * @property string      $description
 * @property Carbon      $started_at
 * @property Carbon|null $ended_at
 */
class Experience extends Model
{
    use HasFactory;

    protected $casts = [
        'company_name' => 'string',
        'company_url' => 'string',
        'company_logo' => 'string',
        'position' => 'string',
        'description' => 'string',
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
    ];

    protected $dates = [
        'started_at',
        'ended_at',
    ];

    public function tools(): BelongsToMany
    {
        return $this->belongsToMany(Tool::class)
            ->orderByDesc((new Tool())->qualifyColumn('level'))
            ->orderBy((new Tool())->qualifyColumn('type'))
            ->using(ExperienceTool::class)
            ->withPivot(['level_id']);
    }

    protected static function newFactory(): ExperienceFactory
    {
        return ExperienceFactory::new();
    }
}

<?php

declare(strict_types=1);

namespace App\Data\Database\Eloquent\Models;

use App\Domains\Homepage\Contracts\Repositories\ExperienceRepositoryContract;
use App\Foundation\Enums\ToolType;
use Carbon\Carbon;
use Database\Factories\ExperienceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

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
 * @property Collection<int, Tool> $tools
 */
class Experience extends Model implements ExperienceRepositoryContract
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

    /**
     * @return Collection<int, Tool>
     */
    public function getTopToolByTypeJob(ToolType $type, int $limit = 3): Collection
    {
        return Tool::query()
            ->take($limit)
            ->where('type', $type)
            ->orderBy('type')
            ->orderByDesc('level')
            ->get();
    }

    /**
     * @return Collection<int, Experience>
     */
    public function getListOfExperiencesJob(): Collection
    {
        return $this->newQuery()
            ->with(['tools'])
            ->orderByDesc('started_at')
            ->get();
    }

    protected static function newFactory(): ExperienceFactory
    {
        return ExperienceFactory::new();
    }
}

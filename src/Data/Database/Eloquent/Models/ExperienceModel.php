<?php

declare(strict_types=1);

namespace App\Data\Database\Eloquent\Models;

use App\Domains\Blog\Contracts\Repositories\ExperienceRepositoryContract;
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
 * @property int $id
 * @property string $company_name
 * @property string $company_url
 * @property string $company_logo
 * @property string $position
 * @property string $description
 * @property Carbon $started_at
 * @property Carbon|null $ended_at
 * @property Collection<int, ToolModel> $tools
 */
class ExperienceModel extends Model implements ExperienceRepositoryContract
{
    use HasFactory;

    protected $table = 'experiences';

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
        return $this->belongsToMany(
            ToolModel::class,
            (new ExperienceToolModel)->getTable(),
            (new ExperienceToolModel)->qualifyColumn('experience_id'),
            (new ExperienceToolModel)->qualifyColumn('tool_id'),
        )
            ->orderByDesc((new ToolModel)->qualifyColumn('level'))
            ->orderBy((new ToolModel)->qualifyColumn('type'))
            ->using(ExperienceToolModel::class)
            ->withPivot(['level_id']);
    }

    /**
     * @return Collection<int, ToolModel>
     */
    public function getTopToolByTypeJob(ToolType $type, int $limit = 3): Collection
    {
        return ToolModel::query()
            ->take($limit)
            ->where('type', $type)
            ->orderBy('type')
            ->orderByDesc('level')
            ->get();
    }

    /**
     * @return Collection<int, ExperienceModel>
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

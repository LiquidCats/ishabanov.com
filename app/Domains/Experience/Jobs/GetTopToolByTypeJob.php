<?php

declare(strict_types=1);

namespace App\Domains\Experience\Jobs;

use App\Data\Enums\ToolType;
use App\Data\Models\Tool;
use Illuminate\Database\Eloquent\Collection;
use Lucid\Units\Job;

class GetTopToolByTypeJob extends Job
{
    public function __construct(protected ToolType $type, protected int $limit = 3)
    {
    }

    public function handle(): Collection
    {
        return Tool::query()
            ->take($this->limit)
            ->where('type', $this->type)
            ->orderBy('type')
            ->orderByDesc('level')
            ->get();
    }
}

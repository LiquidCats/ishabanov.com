<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Data\Database\Eloquent\Models\PostModel;
use App\Domains\Blocks\Enums\BlockType;
use App\Domains\Blocks\Presenters\RawPresenter;
use App\Domains\User\ValueObjets\UserId;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

use function fake;
use function now;

class PostFactory extends Factory
{
    protected $model = PostModel::class;

    public function definition(): array
    {
        return [
            'title' => fake()->words(asText: true),
            'preview' => fake()->paragraphs(5, true),
            'blocks' => Collection::make()->push(RawPresenter::createAs(BlockType::RAW, ['content' => fake()->paragraphs(5, true)]))->toArray(),
            'is_draft' => false,
            'published_at' => now()->subDay(),
            // 'created_by' => new UserId(1),
            // 'updated_by' => new UserId(1),
        ];
    }
}

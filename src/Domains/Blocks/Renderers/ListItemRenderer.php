<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Renderers;

use App\Domains\Blocks\Contracts\Enums\StyleEnum;
use App\Domains\Blocks\Enums\BlockStyle;
use App\Domains\Blocks\Enums\BlockType;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;
use Webmozart\Assert\Assert;
use function strip_tags;
use function trim;

readonly class ListItemRenderer extends AbstractRenderer
{
    public function __construct(
        public BlockType $type,
        public string $content,
        public Collection $styles
    ) {
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'content' => $this->content,
            'styles' => $this->styles
                ->map(fn (StyleEnum $e) => $e->toStyle())
                ->toArray(),
        ];
    }

    public static function createAs(
        BlockType $type,
        #[ArrayShape([
            'content' => 'string',
            'styles' => ['string'],
        ])] array $data,
    ): self {
        Assert::false(empty($data), 'cant parse incoming data');

        $styles = Collection::make($data['styles'] ?? [])
            ->map(BlockStyle::tryFrom(...))
            ->filter();

        return new static(
            $type,
            trim(strip_tags($data['content'] ?? '')),
            $styles,
        );
    }
}

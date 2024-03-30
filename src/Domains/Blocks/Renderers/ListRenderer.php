<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Renderers;

use App\Domains\Blocks\Contracts\Enums\StyleEnum;
use App\Domains\Blocks\Enums\BlockType;
use App\Domains\Blocks\Enums\ListTag;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;
use Webmozart\Assert\Assert;

readonly class ListRenderer extends AbstractRenderer
{
    /**
     * @param  Collection<AbstractRenderer>  $items
     */
    public function __construct(
        public BlockType $type,
        public ListTag $tag,
        public Collection $content,
    ) {
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'tag' => $this->tag->value,
            'content' => $this->content->toArray(),
        ];
    }

    public static function createAs(
        BlockType $type,
        #[ArrayShape([
            'tag' => 'string',
            'content' => [
                [
                    'content' => Collection::class,
                    'styles' => ['string'],
                ],
            ],
        ])] array $data,
    ): self {
        Assert::false(empty($data), 'heading Dto cant parse incoming data');

        return new static(
            $type,
            ListTag::from($data['tag']),
            $data['content'] ?? [],
        );
    }
}

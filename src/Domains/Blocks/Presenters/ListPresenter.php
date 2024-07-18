<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Presenters;

use App\Domains\Blocks\Contracts\PresenterContract;
use App\Domains\Blocks\Contracts\StyleValueContainer;
use App\Domains\Blocks\Enums\BlockType;
use App\Domains\Blocks\Enums\ListTag;
use App\Domains\Blocks\Styles\BlockStyleEnum;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;
use Symfony\Component\Uid\AbstractUid;
use Symfony\Component\Uid\Uuid;
use Webmozart\Assert\Assert;

readonly class ListPresenter implements Arrayable, PresenterContract
{
    public function __construct(
        public BlockType $type,
        public AbstractUid $key,
        public ListTag $tag,
        public Collection $content,
        public Collection $styles,
    ) {
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'key' => $this->key->toRfc4122(),
            'tag' => $this->tag->value,
            'content' => $this->content->toArray(),
            'style' => $this->styles
                ->map(fn (StyleValueContainer $e) => $e->value)
                ->toArray(),
        ];
    }

    public static function createAs(
        BlockType $type,
        #[ArrayShape([
            'tag' => 'string',
            'styles' => ['string'],
            'content' => [
                [
                    'content' => Collection::class,
                    'styles' => ['string'],
                ],
            ],
        ])] array $data,
    ): self {
        Assert::false(empty($data), 'heading Dto cant parse incoming data');

        $styles = Collection::make($data['styles'] ?? [])
            ->map(BlockStyleEnum::tryFrom(...))
            ->filter();

        $key = Uuid::isValid($data['key'])
           ? Uuid::fromString($data['key'])
           : Uuid::v7();

        return new static(
            type: $type,
            key: $key,
            tag: ListTag::from($data['tag']),
            content: $data['content'] ?? [],
            styles: $styles,
        );
    }
}

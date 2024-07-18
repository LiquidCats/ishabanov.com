<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Presenters;

use App\Domains\Blocks\Contracts\PresenterContract;
use App\Domains\Blocks\Enums\BlockType;
use App\Domains\Blocks\Enums\HeadingTag;
use App\Domains\Blocks\Styles\BlockStyleEnum;
use App\Foundation\Enums\AllowedTags;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;
use Symfony\Component\Uid\AbstractUid;
use Symfony\Component\Uid\Uuid;
use Webmozart\Assert\Assert;

readonly class HeadingPresenter implements Arrayable, PresenterContract
{
    public function __construct(
        public BlockType $type,
        public AbstractUid $key,
        public HeadingTag $tag,
        public string $content,
        public Collection $styles
    ) {
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'key' => $this->key->toRfc4122(),
            'tag' => $this->tag->value,
            'content' => $this->content,
            'styles' => $this->styles
                ->map(fn ($e) => $e->value)
                ->toArray(),
        ];
    }

    public static function createAs(
        BlockType $type,
        #[ArrayShape([
            'key' => 'string',
            'type' => 'string',
            'tag' => 'string',
            'content' => 'string',
            'styles' => ['string'],
        ])] array $data,
    ): self {
        Assert::false(empty($data), 'cant parse incoming data');

        $styles = Collection::make($data['styles'] ?? [])
            ->map(BlockStyleEnum::tryFrom(...))
            ->filter();

        $key = $data['key']
           ? Uuid::fromString($data['key'])
           : Uuid::v7();

        return new static(
            type: $type,
            key: $key,
            tag: HeadingTag::from($data['tag']),
            content: AllowedTags::sanitize($data['content']),
            styles: $styles,
        );
    }
}

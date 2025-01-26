<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Presenters;

use App\Domains\Blocks\Contracts\PresenterContract;
use App\Domains\Blocks\Enums\BlockType;
use App\Domains\Blocks\Styles\ListStyleType;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;
use League\CommonMark\Extension\CommonMark\Node\Block\ListItem;
use Symfony\Component\Uid\AbstractUid;
use Symfony\Component\Uid\Uuid;
use Webmozart\Assert\Assert;

readonly class ListPresenter implements Arrayable, PresenterContract
{
    public function __construct(
        public BlockType $type,
        public AbstractUid $key,
        public Collection $content,
        public Collection $styles,
    ) {}

    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'key' => $this->key->toRfc4122(),
            'content' => $this->content->toArray(),
            'styles' => $this->styles->toArray(),
        ];
    }

    public static function createAs(
        BlockType $type,
        #[ArrayShape([
            'tag' => 'string',
            'key' => 'string',
            'styles' => [
                'type' => 'string',
            ],
            'content' => [
                [
                    'content' => 'string',
                    'styles' => [
                        'type' => 'string',
                    ],
                ],
            ],
        ])] array $data,
    ): self {
        Assert::false(empty($data), 'heading Dto cant parse incoming data');

        $rawStyleType = Arr::get($data, 'styles.type', ListStyleType::UNORDERED->value);
        $styles = Collection::make([
            'type' => ListStyleType::tryFrom($rawStyleType),
        ]);

        $key = Uuid::isValid($data['key'] ?? '')
           ? Uuid::fromString($data['key'])
           : Uuid::v7();

        return new static(
            type: $type,
            key: $key,
            content: $data['content'] ?? [],
            styles: $styles,
        );
    }
}

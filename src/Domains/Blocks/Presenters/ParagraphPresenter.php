<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Presenters;

use App\Domains\Blocks\Contracts\PresenterContract;
use App\Domains\Blocks\Enums\BlockType;
use App\Domains\Blocks\Styles\ParagraphStyleType;
use App\Foundation\Enums\AllowedTags;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;
use Symfony\Component\Uid\AbstractUid;
use Symfony\Component\Uid\Uuid;
use Webmozart\Assert\Assert;

readonly class ParagraphPresenter implements Arrayable, PresenterContract
{
    public function __construct(
        public BlockType $type,
        public AbstractUid $key,
        public string $content,
        public Collection $styles
    ) {}

    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'key' => $this->key->toRfc4122(),
            'content' => $this->content,
            'styles' => $this->styles->toArray(),
        ];
    }

    public static function createAs(
        BlockType $type,
        #[ArrayShape([
            'key' => 'string',
            'content' => 'string',
            'styles' => [
                'type' => 'string',
            ],
        ])] array $data,
    ): self {
        Assert::false(empty($data), 'cant parse incoming data');

        $rawStyleType = Arr::get($data, 'styles.type', ParagraphStyleType::UNSTYLED->value);
        $styles = Collection::make([
            'type' => ParagraphStyleType::tryFrom($rawStyleType),
        ]);

        $key = Uuid::isValid($data['key'] ?? '')
           ? Uuid::fromString($data['key'])
           : Uuid::v7();

        return new static(
            type: $type,
            key: $key,
            content: AllowedTags::sanitize($data['content'] ?? ''),
            styles: $styles,
        );
    }
}

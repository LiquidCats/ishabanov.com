<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Presenters;

use App\Domains\Blocks\Contracts\PresenterContract;
use App\Domains\Blocks\Contracts\StyleValueContainer;
use App\Domains\Blocks\Enums\BlockType;
use App\Domains\Blocks\Styles\BlockStyleEnum;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\ObjectShape;
use stdClass;
use Symfony\Component\Uid\AbstractUid;
use Symfony\Component\Uid\Uuid;
use Webmozart\Assert\Assert;

use function strip_tags;
use function trim;

readonly class ImagePresenter implements Arrayable, PresenterContract
{
    public function __construct(
        public BlockType $type,
        public AbstractUid $key,
        #[ObjectShape([
            'src' => 'string',
            'alt' => 'string',
            'caption' => 'string',
        ])] public stdClass $content,
        public Collection $styles,
    ) {}

    public static function createAs(
        BlockType $type,
        #[ArrayShape([
            'key' => 'string',
            'content' => [
                'src' => 'string',
                'alt' => 'string',
                'caption' => 'string',
            ],
            'styles' => ['string'],
        ])] array $data
    ): self {
        Assert::false(empty($data), 'cant parse incoming data');

        $content = new stdClass;
        $content->src = trim(strip_tags($data['content']['src'] ?? ''));
        $content->alt = trim(strip_tags($data['content']['alt'] ?? ''));
        $content->caption = trim(strip_tags($data['content']['caption'] ?? ''));

        $styles = Collection::make($data['styles'] ?? [])
            ->map(BlockStyleEnum::tryFrom(...))
            ->filter();

        $key = Uuid::isValid($data['key'] ?? '')
           ? Uuid::fromString($data['key'])
           : Uuid::v7();

        return new static(
            type: $type,
            key: $key,
            content: $content,
            styles: $styles
        );
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'key' => $this->key->toRfc4122(),
            'content' => [
                'src' => $this->content->src,
                'alt' => $this->content->alt,
                'caption' => $this->content->caption,
            ],
            'styles' => $this->styles
                ->map(fn (StyleValueContainer $e) => $e->value)
                ->toArray(),
        ];
    }
}

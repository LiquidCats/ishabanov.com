<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Renderers;

use App\Domains\Blocks\Contracts\Enums\StyleEnum;
use App\Domains\Blocks\Enums\BlockStyle;
use App\Domains\Blocks\Enums\BlockType;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\ObjectShape;
use stdClass;
use Webmozart\Assert\Assert;

use function strip_tags;
use function trim;

readonly class ImageRenderer extends AbstractRenderer
{
    public function __construct(
        public BlockType $type,
        #[ObjectShape([
            'src' => 'string',
            'alt' => 'string',
            'caption' => 'string',
        ])] public stdClass $content,
        public Collection $styles,
    ) {
    }

    public static function createAs(
        BlockType $type,
        #[ArrayShape([
            'content' => [
                'src' => 'string',
                'alt' => 'string',
                'caption' => 'string',
            ],
            'styles' => ['string'],
        ])] array $data
    ): self {
        Assert::false(empty($data), 'cant parse incoming data');

        $content = new stdClass();
        $content->src = trim(strip_tags($data['content']['src'] ?? ''));
        $content->alt = trim(strip_tags($data['content']['alt'] ?? ''));
        $content->caption = trim(strip_tags($data['content']['caption'] ?? ''));

        $styles = Collection::make($data['styles'] ?? [])
            ->map(BlockStyle::tryFrom(...))
            ->filter();

        return new static($type, $content, $styles);
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'content' => [
                'src' => $this->content->src,
                'alt' => $this->content->alt,
                'caption' => $this->content->caption,
            ],
            'styles' => $this->styles
                ->map(fn (StyleEnum $e) => $e->value)
                ->toArray(),
        ];
    }
}

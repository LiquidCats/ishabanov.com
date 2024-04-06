<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Renderers;

use App\Domains\Blocks\Enums\BlockType;
use App\Domains\Blocks\Enums\CodeLanguage;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;

readonly class CodeRenderer extends AbstractRenderer
{
    public function __construct(
        public BlockType $type,
        public string $content,
        public Collection $styles,
    ) {
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'content' => $this->content,
        ];
    }

    public static function createAs(
        BlockType $type,
        #[ArrayShape([
            'content' => 'string',
            'styles' => ['string'],
        ])] array $data,
    ): self {
        $styles = Collection::make($data['styles'] ?? [])
            ->map(CodeLanguage::tryFrom(...))
            ->filter();

        return new static(
            $type,
            $data['content'] ?? '',
            $styles
        );
    }
}

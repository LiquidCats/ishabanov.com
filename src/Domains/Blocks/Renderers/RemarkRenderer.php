<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Renderers;

use App\Domains\Blocks\Enums\BlockType;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;

readonly class RemarkRenderer extends AbstractRenderer
{
    public function __construct(
        public BlockType $type,
        public Collection $content,
    ) {
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'content' => $this->content->toArray(),
        ];
    }

    public static function createAs(
        BlockType $type,
        #[ArrayShape([
            'content' => Collection::class,
        ])] array $data,
    ): self {
        return new static(
            $type,
            $data['content'],
        );
    }
}

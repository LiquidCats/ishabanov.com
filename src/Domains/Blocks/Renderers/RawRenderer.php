<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Renderers;

use App\Domains\Blocks\Enums\BlockType;

readonly class RawRenderer extends AbstractRenderer
{
    public function __construct(
        public BlockType $type,
        public string $content,
    ) {
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'content' => $this->content,
        ];
    }

    public static function createAs(BlockType $type, array $data): self
    {
        return new static(
            $type,
            $data['content'] ?? '',
        );
    }
}

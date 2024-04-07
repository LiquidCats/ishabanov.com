<?php

declare(strict_types=1);

namespace App\Pages\Presentation\Http\Views\Renderers\Blocks;

use App\Domains\Blocks\Collections\BlocksCollection;
use App\Domains\Blocks\Contracts\Renderers\BlockRendererContract;
use App\Domains\Blocks\Contracts\Renderers\BlocksParserContract;
use App\Domains\Blocks\Enums\BlockType;
use App\Domains\Blocks\Renderers\AbstractRenderer;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;

use function array_is_list;
use function array_key_exists;
use function class_exists;
use function is_array;

class JsonBlocksParser implements BlocksParserContract
{
    public function parse(Collection $blocks): BlocksCollection
    {
        return BlocksCollection::make($blocks)
            ->map($this->parseBlock(...))
            ->filter();
    }

    private function parseBlock(#[ArrayShape([
        'type' => 'string',
        'content' => 'string|array'
    ])]  array $block): ?BlockRendererContract {
        $type = BlockType::tryFrom($block['type'] ?? '');
        if ($type === null) {
            return null;
        }

        /** @var AbstractRenderer|class-string $class */
        $class = $type->getRenderer();
        if (! class_exists($class)) {
            return null;
        }

        if ($this->hasNestedBlocks($block)) {
            $block['content'] = $this->parse(Collection::make($block['content']));
        }

        return $class::createAs($type, $block);
    }

    private function hasNestedBlocks(#[ArrayShape(['content' => 'array'])] array $block): bool
    {
        return array_key_exists('content', $block)
            && is_array($block['content'])
            && array_is_list($block['content']);
    }
}

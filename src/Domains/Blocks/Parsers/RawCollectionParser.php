<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Parsers;

use App\Domains\Blocks\Collections\BlocksCollection;
use App\Domains\Blocks\Enums\BlockType;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;

use function array_is_list;
use function array_key_exists;
use function is_array;

readonly class RawCollectionParser
{
    public function parse(Collection $blocks): BlocksCollection
    {
        $blocksCollection = new BlocksCollection;

        foreach ($blocks as $block) {
            $parsedBlock = $this->parseBlock($block);
            if ($parsedBlock === null) {
                continue;
            }
            $blocksCollection->push($parsedBlock);
        }

        return $blocksCollection;
    }

    private function parseBlock(#[ArrayShape([
        'type' => 'string',
        'content' => 'string|array',
    ])] array $block): ?object
    {
        $type = BlockType::tryFrom($block['type'] ?? '');
        if ($type === null) {
            return null;
        }

        if ($this->hasNestedBlocks($block)) {
            $block['content'] = $this->parse(Collection::make($block['content']));
        }

        return $type->toPresenter($block);
    }

    private function hasNestedBlocks(#[ArrayShape(['content' => 'array'])] array $block): bool
    {
        return array_key_exists('content', $block)
            && is_array($block['content'])
            && array_is_list($block['content']);
    }
}

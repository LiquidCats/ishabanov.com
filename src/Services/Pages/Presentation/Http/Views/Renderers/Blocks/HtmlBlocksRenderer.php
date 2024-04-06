<?php

declare(strict_types=1);

namespace App\Pages\Presentation\Http\Views\Renderers\Blocks;

use App\Domains\Blocks\Collections\BlocksCollection;
use App\Domains\Blocks\Contracts\Renderers\BlocksRendererContract;
use App\Domains\Blocks\Enums\BlockType;
use App\Domains\Blocks\Renderers\AbstractRenderer;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;

use function array_is_list;
use function array_key_exists;
use function class_exists;
use function is_array;

class HtmlBlocksRenderer implements BlocksRendererContract
{
    public function parse(Collection $blocks): BlocksCollection
    {
        return BlocksCollection::make($blocks)
            ->map(function (#[ArrayShape(['type' => 'string', 'content' => 'string|array'])] $block) {
                $type = BlockType::tryFrom($block['type'] ?? '');
                if ($type === null) {
                    return null;
                }

                /** @var AbstractRenderer|class-string $class */
                $class = $type->getRenderer();
                if (! class_exists($class)) {
                    return null;
                }

                if (
                    array_key_exists('content', $block)
                    && is_array($block['content'])
                    && array_is_list($block['content'])
                ) {
                    $block['content'] = $this->parse(Collection::make($block['content']));
                }

                return $class::createAs($type, $block);
            })
            ->filter();
    }
}

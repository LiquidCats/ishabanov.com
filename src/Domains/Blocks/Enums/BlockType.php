<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Enums;

use App\Domains\Blocks\Renderers\CodeRenderer;
use App\Domains\Blocks\Renderers\HeadingRenderer;
use App\Domains\Blocks\Renderers\ImageRenderer;
use App\Domains\Blocks\Renderers\ListItemRenderer;
use App\Domains\Blocks\Renderers\ListRenderer;
use App\Domains\Blocks\Renderers\ParagraphRenderer;
use App\Domains\Blocks\Renderers\RawRenderer;
use App\Domains\Blocks\Renderers\RemarkRenderer;

enum BlockType: string
{
    case HEADING = 'heading';
    case IMAGE = 'image';
    case LIST = 'list';
    case LIST_ITEM = 'list-item';
    case PARAGRAPH = 'paragraph';
    case CODE = 'code';
    case REMARK = 'remark';
    case RAW = 'raw';

    public function getView(): string
    {
        return match ($this) {
            self::HEADING => 'includes.blocks.heading',
            self::IMAGE => 'includes.blocks.image',
            self::LIST => 'includes.blocks.list',
            self::LIST_ITEM => 'includes.blocks.list-item',
            self::PARAGRAPH => 'includes.blocks.paragraph',
            self::CODE => 'includes.blocks.code',
            self::REMARK => 'includes.blocks.remark',
            self::RAW => 'includes.blocks.raw',
        };
    }

    /**
     * @return class-string
     */
    public function getRenderer(): string
    {
        return match ($this) {
            self::HEADING => HeadingRenderer::class,
            self::IMAGE => ImageRenderer::class,
            self::LIST => ListRenderer::class,
            self::LIST_ITEM => ListItemRenderer::class,
            self::PARAGRAPH => ParagraphRenderer::class,
            self::CODE => CodeRenderer::class,
            self::REMARK => RemarkRenderer::class,
            self::RAW => RawRenderer::class,
        };
    }
}

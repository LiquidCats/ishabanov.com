<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Enums;

use App\Domains\Blocks\Contracts\PresenterContract;
use App\Domains\Blocks\Presenters\CodePresenter;
use App\Domains\Blocks\Presenters\HeadingPresenter;
use App\Domains\Blocks\Presenters\ImagePresenter;
use App\Domains\Blocks\Presenters\ListItemPresenter;
use App\Domains\Blocks\Presenters\ListPresenter;
use App\Domains\Blocks\Presenters\ParagraphPresenter;
use App\Domains\Blocks\Presenters\RawPresenter;
use App\Domains\Blocks\Presenters\RemarkPresenter;
use Illuminate\Contracts\Support\Arrayable;

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

    public function toPresenter(array $data): PresenterContract & Arrayable
    {
        return match ($this) {
            self::HEADING => HeadingPresenter::createAs($this, $data),
            self::IMAGE => ImagePresenter::createAs($this, $data),
            self::LIST => ListPresenter::createAs($this, $data),
            self::LIST_ITEM => ListItemPresenter::createAs($this, $data),
            self::PARAGRAPH => ParagraphPresenter::createAs($this, $data),
            self::CODE => CodePresenter::createAs($this, $data),
            self::REMARK => RemarkPresenter::createAs($this, $data),
            self::RAW => RawPresenter::createAs($this, $data),
        };
    }
}

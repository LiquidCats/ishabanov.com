<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Renderers;

use const JSON_THROW_ON_ERROR;

use App\Domains\Blocks\Contracts\Renderers\BlockRendererContract;
use App\Domains\Blocks\Enums\BlockType;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\View\View;
use JsonException;

use function json_encode;

/**
 * @property-read BlockType $type
 */
abstract readonly class AbstractRenderer implements Arrayable, BlockRendererContract, Jsonable
{
    /**
     * @throws JsonException
     */
    public function toJson($options = 0): string
    {
        return json_encode($this->toArray(), JSON_THROW_ON_ERROR | $options);
    }

    public function render(): View
    {
        return \view($this->type->getView(), get_object_vars($this));
    }
}

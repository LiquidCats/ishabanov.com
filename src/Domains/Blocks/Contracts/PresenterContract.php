<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Contracts;

use App\Domains\Blocks\Enums\BlockType;

interface PresenterContract
{
    public static function createAs(BlockType $type, array $data): PresenterContract;
}

<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Collections;

use App\Domains\Blocks\Renderers\AbstractRenderer;
use Illuminate\Support\Collection;

/**
 * @extends Collection<int, AbstractRenderer>
 */
class BlocksCollection extends Collection
{
}

<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Collections;

use App\Domains\Blocks\Contracts\PresenterContract;
use Illuminate\Support\Collection;

/**
 * @extends Collection<int, PresenterContract>
 */
class BlocksCollection extends Collection {}

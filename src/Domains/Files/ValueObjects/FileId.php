<?php

declare(strict_types=1);

namespace App\Domains\Files\ValueObjects;

use App\Foundation\ValueObjects\AbstractValueObject;
use App\Foundation\ValueObjects\Resolvable;

readonly class FileId extends AbstractValueObject
{
    use Resolvable;

    public const AS_KEY = 'filed_id';
}

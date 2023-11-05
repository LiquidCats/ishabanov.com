<?php

namespace App\Domains\Blog\ValueObjects;

use App\Foundation\ValueObjects\AbstractValueObject;
use Illuminate\Http\Request;
use function assert;

readonly class TagId extends AbstractValueObject
{
    public static function fromRequest(Request $request): static
    {
        return new static(
            $request->route()?->parameter('tag_id')
        );
    }
}

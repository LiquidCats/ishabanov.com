<?php

namespace App\Domains\Blog\ValueObjects;

use App\Foundation\ValueObjects\AbstractValueObject;
use Illuminate\Http\Request;

readonly class PostId extends AbstractValueObject
{
    public static function fromRequest(Request $request): static
    {
        return new static($request->route()?->parameter('post_id'));
    }
}

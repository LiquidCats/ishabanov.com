<?php

namespace App\Domains\Blog\Entities;

use App\Domains\Blog\ValueObjects\TagId;

readonly class Tag
{
    public function __construct(
        public string $title,
        public ?TagId $id = null,
    ) {
    }
}

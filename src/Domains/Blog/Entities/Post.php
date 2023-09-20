<?php

namespace App\Domains\Blog\Entities;

use App\Domains\Blog\ValueObjects\PostId;
use Carbon\Carbon;
use Illuminate\Support\Collection;

readonly class Post
{
    public function __construct(
        public string $title,
        public string $content,
        public Carbon $publishAt,
        public Collection $tags,
        public ?PostId $postId = null,
    )
    {
    }
}

<?php

namespace App\Domains\Blog\Contracts\Services;

use App\Domains\Blog\Entities\Post;
use App\Domains\Blog\ValueObjects\TagSlug;
use Illuminate\Support\Collection;

interface BlogServiceContract
{
    /**
     * @param  Collection<int, TagSlug>  $tags
     * @return Collection<int, Post>
     */
    public function getPosts(Collection $tags, int $page = 1): Collection;
}

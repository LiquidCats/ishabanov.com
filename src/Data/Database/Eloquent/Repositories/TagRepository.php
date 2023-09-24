<?php

namespace App\Data\Database\Eloquent\Repositories;

use App\Data\Database\Eloquent\Models\Tag;
use App\Domains\Blog\Contracts\Repositories\TagRepositoryContract;
use App\Domains\Blog\ValueObjects\PostId;
use App\Domains\Blog\ValueObjects\TagId;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagRepository implements TagRepositoryContract
{
    public function create(string $name): Tag
    {
        $model = new Tag();

        $model->name = $name;
        $model->slug = Str::of($name)
            ->lower()
            ->slug()
            ->toString();

        return $model;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function search(string $search): Collection
    {
        return Tag::query()
            ->whereFullText(['slug', 'name'], $search)
            ->limit(15)
            ->get();
    }

    public function unlinkFromPost(PostId $postId, TagId $tagId): bool
    {
        return DB::table('post_tag')
            ->where('post_id', $postId->value)
            ->where('tag_id', $tagId->value)
            ->delete() > 0;
    }

    public function linkToPost(PostId $postId, TagId $tagId): bool
    {
        return DB::table('post_tag')
            ->insert([
                'post_id' => $postId,
                'tag_id' => $tagId,
            ]);
    }
}

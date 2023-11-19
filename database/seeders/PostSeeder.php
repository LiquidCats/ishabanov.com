<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Data\Database\Eloquent\Models\PostModel;
use App\Data\Database\Eloquent\Models\TagModel;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = PostModel::factory(16)->create();
        $tags = TagModel::query()->get();
        if ($tags->count() === 0) {
            $tags = TagModel::factory(6)->create();
        }
        $tags = $tags->pluck('id');

        /** @var PostModel $post */
        foreach ($posts as $post) {
            $tagIds = $tags->random(3);

            $post->tags()->sync($tagIds);
        }
    }
}

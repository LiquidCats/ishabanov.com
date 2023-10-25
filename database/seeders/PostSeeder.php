<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Data\Database\Eloquent\Models\Post;
use App\Data\Database\Eloquent\Models\Tag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = Post::factory(16)->create();
        $tags = Tag::query()->get();
        if ($tags->count() === 0) {
            $tags = Tag::factory(6)->create();
        }
        $tags = $tags->pluck('id');

        /** @var Post $post */
        foreach ($posts as $post) {
            $tagIds = $tags->random(3);

            $post->tags()->sync($tagIds);
        }
    }
}

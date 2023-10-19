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
        Tag::factory(6)->create();

        /** @var Post $post */
        foreach ($posts as $post) {
            $ids = Tag::query()
                ->inRandomOrder()
                ->take(2)
                ->get()
                ->map(fn (Tag $t) => $t->getKey());

            $post->tags()->sync($ids);
        }
    }
}

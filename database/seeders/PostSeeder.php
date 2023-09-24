<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Data\Database\Eloquent\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Collection::times(3)->each(static function () {
            Post::factory()->create();
        });
    }
}

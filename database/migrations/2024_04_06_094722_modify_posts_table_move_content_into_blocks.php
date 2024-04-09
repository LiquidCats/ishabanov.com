<?php

use App\Data\Database\Eloquent\Models\PostModel;
use App\Domains\Blocks\Enums\BlockType;
use App\Domains\Blocks\Renderers\RawRenderer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::transaction(static function () {
            /** @var Collection<int, PostModel> $posts */
            $posts = PostModel::all();

            foreach ($posts as $post) {
                $preview = RawRenderer::createAs(BlockType::RAW, [
                    'content' => $post->preview,
                ]);
                $content = RawRenderer::createAs(BlockType::RAW, [
                    'content' => $post->content,
                ]);

                $post->blocks = Collection::make()
                    ->push($preview)
                    ->push($content);

                $post->save();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::transaction(static function () {
            /** @var Collection<int, PostModel> $posts */
            $posts = PostModel::all();

            foreach ($posts as $post) {
                /** @var RawRenderer $block */
                $block = $post->blocks->first();

                $post->content = $block['content'];

                $post->save();
            }
        });
    }
};

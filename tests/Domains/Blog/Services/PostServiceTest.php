<?php

declare(strict_types=1);

namespace Tests\Domains\Blog\Services;

use App\Admin\Application\Services\PostService;
use App\Data\Database\Eloquent\Models\PostModel;
use App\Data\Database\Eloquent\Models\TagModel;
use App\Data\Database\Eloquent\Models\UserModel;
use App\Domains\Blocks\Enums\BlockType;
use App\Domains\Blocks\Renderers\RawContainer;
use App\Domains\Blog\Contracts\Services\PostServiceContract;
use App\Domains\Blog\Dto\PostDto;
use App\Domains\Blog\Enums\PostPreviewType;
use App\Domains\Blog\ValueObjects\PostId;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\TestCase;

use function fake;
use function now;

#[CoversClass(PostService::class)]
class PostServiceTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        UserModel::factory()->create();
        PostModel::factory(5)->create();
        TagModel::factory(5)->create();
    }

    public function test_can_get_paginated_list_of_posts(): void
    {
        /** @var PostServiceContract $service */
        $service = $this->app->make(PostService::class);

        $result = $service->paginate();

        $this->assertInstanceOf(LengthAwarePaginator::class, $result);
        $this->assertCount(5, $result);

        $first = $result->get(0);
        $this->assertInstanceOf(PostModel::class, $first);
        $this->assertTrue($first->relationLoaded('tags'));
        $this->assertTrue($first->relationLoaded('previewImage'));

        $second = $result->get(1);
        $this->assertInstanceOf(PostModel::class, $second);
        $this->assertTrue($second->relationLoaded('tags'));
        $this->assertTrue($second->relationLoaded('previewImage'));

        $this->assertTrue($first->getKey() > $second->getKey());
    }

    public function test_can_get_post_by_id(): void
    {
        /** @var PostServiceContract $service */
        $service = $this->app->make(PostService::class);

        $postId = new PostId(fake()->numberBetween(1, PostModel::count()));

        $result = $service->getPost($postId);

        $this->assertEquals($postId->value, $result->getKey());
        $this->assertTrue($result->relationLoaded('tags'));
        $this->assertTrue($result->relationLoaded('previewImage'));
    }

    public function test_can_create_new_post_with_tags(): void
    {
        /** @var PostServiceContract $service */
        $service = $this->app->make(PostService::class);

        $tagsIds = TagModel::query()->inRandomOrder()->get();

        $data = PostDto::fromArray([
            'title' => fake()->words(4, true),
            'preview' => fake()->text(),
            'blocks' => Collection::make()
                ->push(RawContainer::createAs(BlockType::RAW, ['content' => fake()->text(1000)]))
                ->toArray(),
            'published_at' => now()->toDateTimeString(),
            'is_draft' => fake()->boolean,
            'preview_image_id' => (string) fake()->numberBetween(100_000, 999_999),
            'preview_image_type' => PostPreviewType::FILL->value,
            'tags' => $tagsIds->toArray(),
        ]);

        $result = $service->createPost($data);

        $this->assertEquals(6, PostModel::query()->count());
        $this->assertDatabaseHas((new PostModel())->getTable(), [
            'id' => $result->getKey(),
            'title' => $data->title,
            'preview' => $data->preview,
            'published_at' => $data->publishedAt,
            'is_draft' => (int) $data->isDraft,
            'preview_image_id' => $data->previewImageId,
            'preview_image_type' => $data->previewImageType->value,
        ]);
        $this->assertEquals($data->title, $result->title);
        $this->assertEquals($data->preview, $result->preview);
        $this->assertEquals($data->isDraft, $result->is_draft);
        $this->assertEquals($data->previewImageId, $result->preview_image_id);
        $this->assertEquals($data->previewImageType, $result->preview_image_type);

        $this->assertTrue($data->publishedAt->startOfMinute()->equalTo($result->published_at));

        $this->assertEquals(
            $data->tags->pluck('id')->toArray(),
            $result->tags()->pluck('id')->toArray()
        );
    }

    public function test_can_update_existing_post(): void
    {
        /** @var PostServiceContract $service */
        $service = $this->app->make(PostService::class);

        /** @var PostModel $post */
        $post = PostModel::query()->inRandomOrder()->first();
        $tagsIds = TagModel::query()->inRandomOrder()->get();

        $data = PostDto::fromArray([
            'title' => fake()->words(4, true),
            'preview' => fake()->text(),
            'blocks' => Collection::make()
                ->push(RawContainer::createAs(BlockType::RAW, ['content' => fake()->text(1000)]))
                ->toArray(),
            'published_at' => now()->toDateTimeString(),
            'is_draft' => fake()->boolean,
            'preview_image_id' => (string) fake()->numberBetween(100_000, 999_999),
            'preview_image_type' => PostPreviewType::FILL->value,
            'tags' => $tagsIds,
        ]);

        $result = $service->updatePost(new PostId($post->getKey()), $data);

        $this->assertEquals(5, PostModel::query()->count());
        $this->assertDatabaseHas((new PostModel())->getTable(), [
            'id' => $result->getKey(),
            'title' => $data->title,
            'preview' => $data->preview,
            'published_at' => $data->publishedAt,
            'is_draft' => (int) $data->isDraft,
            'preview_image_id' => $data->previewImageId,
            'preview_image_type' => $data->previewImageType->value,
        ]);

        $this->assertEquals($data->title, $result->title);
        $this->assertEquals($data->preview, $result->preview);
        $this->assertEquals($data->isDraft, $result->is_draft);
        $this->assertEquals($data->previewImageId, $result->preview_image_id);
        $this->assertEquals($data->previewImageType, $result->preview_image_type);

        $this->assertTrue($data->publishedAt->startOfMinute()->equalTo($result->published_at));

        $this->assertEquals(
            $data->tags->pluck('id')->toArray(),
            $result->tags()->pluck('id')->toArray()
        );
    }

    public function test_can_change_state(): void
    {
        /** @var PostServiceContract $service */
        $service = $this->app->make(PostService::class);

        /** @var PostModel $post */
        $post = PostModel::query()->inRandomOrder()->first();

        $result = $service->changeState(new PostId($post->getKey()));

        $this->assertDatabaseHas((new PostModel())->getTable(), [
            'is_draft' => (int) $result->is_draft,
        ]);

        $this->assertNotEquals($post->is_draft, $result->is_draft);
    }

    public function test_can_delete_post(): void
    {
        /** @var PostServiceContract $service */
        $service = $this->app->make(PostService::class);

        /** @var PostModel $post */
        $post = PostModel::query()->inRandomOrder()->first();

        $result = $service->deletePost(new PostId($post->getKey()));

        $this->assertCount(1, $result);

        foreach ($result as $item) {
            $this->assertDatabaseMissing((new PostModel())->getTable(), [
                'id' => $item->getKey(),
            ]);
        }
    }
}

<?php

declare(strict_types=1);

namespace Tests\Feature\Services\Admin;

use App\Data\Database\Eloquent\Models\FileModel;
use App\Data\Database\Eloquent\Models\PostModel;
use App\Data\Database\Eloquent\Models\TagModel;
use App\Data\Database\Eloquent\Models\UserModel;
use App\Domains\Blog\Enums\PostPreviewType;
use App\Domains\Blog\ValueObjects\PostId;
use Illuminate\Support\Collection;
use Tests\TestCase;

use function route;

class PostsApiV1Test extends TestCase
{
    protected readonly UserModel $user;

    protected readonly FileModel $preview;

    protected readonly Collection $posts;

    protected readonly Collection $tags;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = UserModel::factory()->create();
        $this->posts = PostModel::factory(50)->create();
        $this->tags = TagModel::factory(10)->create();

        FileModel::factory()->create();

        $this->preview = FileModel::query()->first();

        $this->posts->each(function (PostModel $p) {
            $p->tags()->sync($this->tags->random(3)->pluck('id'));
        });

        $this->actingAs($this->user);
    }

    public function test_should_list_all_posts(): void
    {
        $response = $this->getJson(route('admin.api.posts.list'));

        $response->assertSuccessful();
        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'title',
                    'preview',
                    'preview_image_type',
                    'preview_image_id',
                    'content',
                    'is_draft',
                    'published_at',
                    'reading_time',
                    //
                    'tags' => [
                        [
                            'id',
                            'name',
                            'slug',
                        ],
                    ],
                ],
            ],
        ]);
        $data = $response->json('data', []);
        $this->assertNotEmpty($data);
        $this->assertCount(5, $data);
        $this->assertEquals(10, $response->json('meta.last_page'));
    }

    public function test_should_get_single_post(): void
    {
        /** @var PostModel $post */
        $post = $this->posts->random(1)->first();

        $response = $this->getJson(route('admin.api.posts.show', [
            PostId::AS_KEY => $post->getKey(),
        ]));

        $response->assertSuccessful();
        $response->assertJsonStructure([
            'data' => [
                'id',
                'title',
                'preview',
                'preview_image_type',
                'preview_image_id',
                'content',
                'is_draft',
                'published_at',
                'reading_time',
                //
                'tags' => [
                    [
                        'id',
                        'name',
                        'slug',
                    ],
                ],
                'previewImage',
            ],
        ]);

        $this->assertEquals($post->getKey(), $response->json('data.id'));
    }

    public function test_should_store_post(): void
    {
        $tags = $this->tags->random(3);
        $data = [
            ...PostModel::factory()->make()->toArray(),
            'tags' => $tags->toArray(),
            'preview_image_type' => PostPreviewType::FILL,
            'preview_image_id' => $this->preview->hash,
        ];

        $response = $this->postJson(route('admin.api.posts.store'), $data);

        $response->assertSuccessful();
        $response->assertJsonStructure([
            'data' => [
                'id',
                'title',
                'preview',
                'preview_image_type',
                'preview_image_id',
                'content',
                'is_draft',
                'published_at',
                'reading_time',
                //
                'tags' => [
                    [
                        'id',
                        'name',
                        'slug',
                    ],
                ],
                'previewImage' => [
                    'hash',
                    'type',
                    'path',
                    'extension',
                    'name',
                    'file_size',
                ],
            ],
        ]);

        $this->assertDatabaseCount((new PostModel())->getTable(), 51);

        $id = $response->json('data.id');

        $this->assertDatabaseHas((new PostModel())->getTable(), [
            'id' => $id,
            'title' => $data['title'],
            'preview' => $data['preview'],
            'preview_image_type' => $data['preview_image_type'],
            'preview_image_id' => $data['preview_image_id'],
            'content' => $data['content'],
            'is_draft' => $data['is_draft'],
        ]);

        foreach ($tags as $tag) {
            $this->assertDatabaseHas('post_tag', [
                'post_id' => $id,
                'tag_id' => $tag->getKey(),
            ]);
        }
    }

    public function test_should_update_post(): void
    {
        $post = $this->posts->random();

        $tags = $this->tags->random(3);

        $data = [
            ...PostModel::factory()->make()->toArray(),
            'tags' => $tags,
            'preview_image_type' => PostPreviewType::FILL->value,
            'preview_image_id' => $this->preview->hash,
        ];

        $response = $this->putJson(route('admin.api.posts.update', [
            PostId::AS_KEY => $post->getKey(),
        ]), $data);

        $response->assertSuccessful();
        $response->assertJsonStructure([
            'data' => [
                'id',
                'title',
                'preview',
                'preview_image_type',
                'preview_image_id',
                'content',
                'is_draft',
                'published_at',
                'reading_time',
                //
                'tags' => [
                    [
                        'id',
                        'name',
                        'slug',
                    ],
                ],
                'previewImage' => [
                    'hash',
                    'type',
                    'path',
                    'extension',
                    'name',
                    'file_size',
                ],
            ],
        ]);

        $id = $response->json('data.id');

        $this->assertDatabaseHas((new PostModel())->getTable(), [
            'id' => $id,
            'title' => $data['title'],
            'preview' => $data['preview'],
            'preview_image_type' => $data['preview_image_type'],
            'preview_image_id' => $data['preview_image_id'],
            'content' => $data['content'],
            'is_draft' => $data['is_draft'],
        ]);

        foreach ($tags as $tag) {
            $this->assertDatabaseHas('post_tag', [
                'post_id' => $id,
                'tag_id' => $tag->getKey(),
            ]);
        }
    }

    public function test_should_delete_post(): void
    {
        $post = $this->posts->random();

        $response = $this->deleteJson(route('admin.api.posts.delete', [
            PostId::AS_KEY => $post->getKey(),
        ]));

        $response->assertSuccessful();

        $id = $response->json('data.id');

        $this->assertDatabaseMissing((new PostModel())->getTable(), [
            'id' => $id,
        ]);
    }

    public function test_should_change_state(): void
    {
        $post = $this->posts->random();

        $response = $this->patchJson(route('admin.api.posts.state', [
            PostId::AS_KEY => $post->getKey(),
        ]));

        $response->assertSuccessful();

        $this->assertEquals(! $post->is_draft, $response->json('data.is_draft'));
    }
}

<?php

declare(strict_types=1);

namespace Tests\Feature\Services\Admin;

use App\Data\Database\Eloquent\Models\TagModel;
use App\Data\Database\Eloquent\Models\UserModel;
use App\Domains\Blog\ValueObjects\TagId;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

use function route;

class TagApiV1Test extends TestCase
{
    protected UserModel $user;

    protected Collection $tags;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = UserModel::factory()->create();
        $this->tags = TagModel::factory(50)->create();

        $this->actingAs($this->user);
    }

    public function test_should_list_tags(): void
    {
        $response = $this->getJson(route('admin.api.tags.list'));

        $response->assertSuccessful();
        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'name',
                    'slug',
                ],
            ],
        ]);

        $data = $response->json('data', []);

        $this->assertCount(50, $data);
    }

    public function test_should_store_tag(): void
    {
        /** @var TagModel $data */
        $data = TagModel::factory()->make();


        $response = $this->postJson(route('admin.api.tags.store'), [
            'name' => $data->name,
            'slug' => $data->slug->value,
        ]);

        $response->assertSuccessful();
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'slug',
            ],
        ]);

        $id = $response->json('data.id');

        $this->assertDatabaseHas((new TagModel)->getTable(), [
            'id' => $id,
            'name' => $data['name'],
            'slug' => $data['slug'],
        ]);
    }

    public function test_should_update_tag(): void
    {
        /** @var TagModel $tag */
        $tag = $this->tags->random();

        $data = TagModel::factory()->make();

        $response = $this->putJson(route('admin.api.tags.update', [
            TagId::asKey() => $tag->getKey()->value,
        ]), [
            'name' => $data->name,
            'slug' => $data->slug->value,
        ]);

        $response->assertSuccessful();

        $id = $response->json('data.id');

        $this->assertDatabaseHas((new TagModel)->getTable(), [
            'id' => $id,
            'name' => $data['name'],
            'slug' => $data['slug'],
        ]);
    }

    public function test_should_delete_tag(): void
    {
        $tag = $this->tags->random();

        $response = $this->deleteJson(route('admin.api.tags.delete', [
            TagId::asKey() => $tag->getKey(),
        ]));

        $response->assertSuccessful();

        $id = $response->json('data.id');

        $this->assertDatabaseMissing((new TagModel)->getTable(), [
            'id' => $id,
        ]);
    }
}

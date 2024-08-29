<?php

declare(strict_types=1);

namespace Tests\Domains\Blog\Services;

use App\Data\Database\Eloquent\Models\TagModel;
use App\Domains\Blog\Contracts\Services\TagServiceContract;
use App\Domains\Blog\Services\PostService;
use App\Domains\Blog\Services\TagService;
use App\Domains\Blog\ValueObjects\TagId;
use Illuminate\Support\Str;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\TestCase;
use function fake;

#[CoversClass(PostService::class)]
class TagServiceTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        TagModel::factory(5)->create();
    }

    public function test_binding(): void
    {
        /** @var TagServiceContract $service */
        $service = $this->app->make(TagServiceContract::class);
        self::assertInstanceOf(TagService::class, $service);
    }

    /**
     * @covers ::create
     */
    public function test_should_create_tag(): void
    {
        /** @var TagServiceContract $service */
        $service = $this->app->make(TagServiceContract::class);

        $tagName = fake()->words(asText: true);

        $tag = $service->create($tagName, null);

        $this->assertEquals($tagName, $tag->name);
        $this->assertNotEmpty($tag->slug);
        $this->assertEquals(Str::of($tagName)->lower()->slug(), $tag->slug);
        $this->assertDatabaseCount($tag->getTable(), 6);
    }

    /**
     * @covers ::update
     */
    public function test_should_update_tag(): void
    {
        /** @var TagServiceContract $service */
        $service = $this->app->make(TagServiceContract::class);

        $tagName = fake()->words(asText: true);

        $randomTag = TagModel::query()->inRandomOrder()->firstOrFail();

        $tagId = new TagId($randomTag->getKey());

        $service->update($tagId, $tagName, null);

        $tag = TagModel::query()->findOrFail($tagId->value);

        $this->assertEquals($tagName, $tag->name);
        $this->assertNotEmpty($tag->slug);
        $this->assertEquals(Str::of($tagName)->lower()->slug(), $tag->slug);
        $this->assertDatabaseCount($tag->getTable(), 5);
    }

    /**
     * @covers ::delete
     */
    public function test_should_delete_tag(): void
    {
        /** @var TagServiceContract $service */
        $service = $this->app->make(TagServiceContract::class);

        $randomTag = TagModel::query()->inRandomOrder()->firstOrFail();

        $tagId = new TagId($randomTag->getKey());

        $service->delete($tagId);

        $this->assertNull(TagModel::query()->find($tagId->value));
    }

    /**
     * @covers ::search
     */
    public function test_should_search_tags(): void
    {
        /** @var TagServiceContract $service */
        $service = $this->app->make(TagServiceContract::class);

        $tags = $service->search();

        $this->assertCount(5, $tags);

        /** @var TagModel $tag */
        $tag = TagModel::query()->inRandomOrder()->first();

        $tags = $service->search($tag->name);

        $this->assertCount(1, $tags);
    }
}

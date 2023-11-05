<?php

namespace App\Data\Database\Eloquent\Models;

use App\Domains\Blog\Contracts\Repositories\PostRepositoryContract;
use App\Domains\Blog\ValueObjects\PostId;
use App\Domains\User\ValueObjets\UserId;
use Carbon\Carbon;
use Database\Factories\PostFactory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use function now;

/**
 * @property string $title
 * @property string $preview
 * @property string $content
 * @property int $author_id
 * @property bool $is_draft
 * @property Carbon|null $published_at
 * @property User|null $author
 * @property Collection<int, Tag> $tags
 */
class Post extends Model implements PostRepositoryContract
{
    use HasFactory;

    protected $casts = [
        'title' => 'string',
        'content' => 'string',
        'author_id' => 'int',
        'is_draft' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected $fillable = [
        'title',
        'content',
        'is_draft',
        'published_at',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    protected static function newFactory(): PostFactory
    {
        return PostFactory::new();
    }

    public function findById(PostId $id): Post
    {
        return Post::query()
            ->with('tags')
            ->where('published_at', '<=', now())
            ->where('is_draft', 0)
            ->findOrFail($id);
    }

    public function getLatest(): LengthAwarePaginator
    {
        return Post::query()
            ->with('tags')
            ->latest('id')
            ->paginate(perPage: 5);
    }

    public function getWithTags(Collection $tags = new Collection()): LengthAwarePaginator
    {
        return Post::query()
            ->select(['id', 'content', 'preview', 'title', 'published_at'])
            ->with('tags')
            ->where('published_at', '<=', now())
            ->where('is_draft', 0)
            ->when($tags->isNotEmpty(), fn (Builder $q) => $q
                ->whereHas('tags', fn (Builder $q) => $q
                    ->whereIn('slug', $tags)
                )
            )
            ->latest('id')
            ->paginate(perPage: 6);
    }

    /**
     * @param  UserId<int>  $userId
     */
    public function create(UserId $userId, Post $post): Post
    {
        $post->save();

        return $post;
    }

    /**
     * @param  PostId<int>  $id
     */
    public function updateById(PostId $id, Post $post): Post
    {
        /** @var Post $model */
        $model = Post::query()
            ->findOrFail($id->value);

        $model->title = $post->title;
        $model->content = $post->content;

        return $model;
    }

    public function deleteById(PostId $id): bool
    {
        return Post::destroy($id->value) === 1;
    }
}

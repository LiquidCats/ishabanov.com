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
 * @property string                    $title
 * @property string                    $preview
 * @property string                    $content
 * @property int                       $author_id
 * @property bool                      $is_draft
 * @property Carbon|null               $published_at
 * @property UserModel|null            $author
 * @property Collection<int, TagModel> $tags
 */
class PostModel extends Model implements PostRepositoryContract
{
    use HasFactory;

    protected $table = 'posts';

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
        return $this->belongsTo(UserModel::class, 'author_id', 'id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(
            TagModel::class,
            'post_tag',
            'tag_id',
            'post_id',
        );
    }

    protected static function newFactory(): PostFactory
    {
        return PostFactory::new();
    }

    public function findById(PostId $id): PostModel
    {
        return $this->newQuery()
            ->with('tags')
            ->findOrFail($id);
    }

    public function getLatest(): LengthAwarePaginator
    {
        return $this->newQuery()
            ->with('tags')
            ->latest('id')
            ->paginate(perPage: 5);
    }

    public function getWithTags(Collection $tags = new Collection()): LengthAwarePaginator
    {
        return PostModel::query()
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
    public function create(UserId $userId, PostModel $post): PostModel
    {
        $post->save();

        return $post;
    }

    /**
     * @param  PostId<int>  $id
     */
    public function updateById(PostId $id, PostModel $post): PostModel
    {
        /** @var PostModel $model */
        $model = PostModel::query()
            ->findOrFail($id->value);

        $model->title = $post->title;
        $model->content = $post->content;

        return $model;
    }

    public function deleteById(PostId $id): bool
    {
        return PostModel::destroy($id->value) === 1;
    }

    public function getPrevious(PostId $postId): ?PostModel
    {
        return $this->newQuery()
            ->select(['title', 'id'])
            ->where('id', '<', $postId->value)
            ->latest('id')
            ->where('is_draft', 0)
            ->where('published_at', '<=', now())
            ->first();
    }

    public function getNext(PostId $postId): ?PostModel
    {
        return $this->newQuery()
            ->select(['title', 'id'])
            ->where('id', '>', $postId)
            ->oldest('id')
            ->where('is_draft', 0)
            ->where('published_at', '<=', now())
            ->first();
    }

    /**
     * @param PostId                    $postId
     * @param Collection<int, TagModel> $tags
     *
     * @return Collection<int, PostModel>
     */
    public function getSimilarByTag(PostId $postId, Collection $tags): Collection
    {
        return $this->newQuery()
            ->select(['title', 'content', 'published_at', 'id'])
            ->whereHas('tags', static function (Builder $builder) use ($tags) {
                $builder->where(function (Builder $builder) use ($tags) {
                    foreach ($tags as $tag) {
                        $builder->orWhere('id', $tag->getKey());
                    }
                });
            })
            ->where('id', '!=', $postId)
            ->where('is_draft', 0)
            ->where('published_at', '<=', now())
            ->latest('id')
            ->limit(3)
            ->get();
    }
}

<?php

namespace App\Data\Database\Eloquent\Models;

use App\Data\Database\Eloquent\Casts\FileIdCast;
use App\Data\Database\Eloquent\Casts\PostIdCast;
use App\Data\Database\Eloquent\Casts\UserIdCast;
use App\Domains\Blocks\Contracts\PresenterContract;
use App\Domains\Blog\Contracts\Repositories\PostRepositoryContract;
use App\Domains\Blog\Dto\PostDto;
use App\Domains\Blog\Enums\PostPreviewType;
use App\Domains\Blog\ValueObjects\PostId;
use App\Domains\Files\ValueObjects\FileId;
use App\Domains\User\ValueObjets\UserId;
use Carbon\Carbon;
use Database\Factories\PostFactory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

use function ceil;
use function now;
use function str_word_count;
use function strip_tags;

/**
 * @property PostId $id
 * @property string $title
 * @property string $preview
 * @property PostPreviewType $preview_image_type
 * @property FileId $preview_image_id
 * @property string $content - deprecated
 * @property Collection<int, PresenterContract> $blocks
 * @property UserId $created_by
 * @property UserId $updated_by
 * @property bool $is_draft
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $published_at
 * @property int $reading_time
 * @property UserModel|null $author
 * @property Collection<int, TagModel> $tags
 * @property FileModel|null $previewImage
 * @method PostId getKey()
 */
class PostModel extends Model implements PostRepositoryContract
{
    use HasFactory;

    protected $table = 'posts';

    protected $keyType = PostIdCast::class;

    protected $casts = [
        'title' => 'string',
        'preview' => 'string',
        'created_by' => UserIdCast::class,
        'updated_by' => UserIdCast::class,
        'is_draft' => 'boolean',
        'published_at' => 'datetime',
        'preview_image_type' => PostPreviewType::class,
        'preview_image_id' => FileIdCast::class,
        'blocks' => AsCollection::class,
    ];

    protected $fillable = [
        'title',
        'preview',
        'blocks',
        'is_draft',
        'published_at',
        'preview_image_type',
        'preview_image_id',
    ];

    protected function readingTime(): Attribute
    {
        return Attribute::make(
            get: static function (mixed $value, array $attributes): int {
                $wordsCount = str_word_count(strip_tags($attributes['preview']));
                $wordsCount += str_word_count(strip_tags($attributes['blocks'] ?? ''));

                $averageReadingSpeed = 200; // You can adjust this value

                return (int) ceil($wordsCount / $averageReadingSpeed);
            },
        );
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'author_id', 'id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(
            TagModel::class,
            'post_tag',
            'post_id',
            'tag_id',
        );
    }

    public function previewImage(): HasOne
    {
        return $this->hasOne(FileModel::class, 'hash', 'preview_image_id');
    }

    protected static function newFactory(): PostFactory
    {
        return PostFactory::new();
    }

    // Repository
    public function findById(PostId $id): PostModel
    {
        return $this->newQuery()
            ->with('tags')
            ->with('previewImage')
            ->findOrFail($id);
    }

    public function getLatest(): LengthAwarePaginator
    {
        return $this->newQuery()
            ->select(['id', 'preview', 'title', 'preview_image_type', 'preview_image_id', 'published_at'])
            ->with('tags')
            ->with('previewImage')
            ->latest('id')
            ->paginate(perPage: 10);
    }

    public function getWithTags(Collection $tags = new Collection): LengthAwarePaginator
    {
        return PostModel::query()
            ->select(['id', 'preview', 'title', 'preview_image_type', 'preview_image_id', 'published_at'])
            ->with('tags')
            ->with('previewImage')
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
    public function create(UserId $userId, PostDto $dto): PostModel
    {
        return (new self)->saveFromDto($dto);
    }

    /**
     * @param  PostId<int>  $id
     */
    public function updateById(PostId $id, PostDto $dto): PostModel
    {
        return $this->findById($id)->saveFromDto($dto);
    }

    private function saveFromDto(PostDto $dto): static
    {
        $this->title = $dto->title;
        $this->preview = $dto->preview;
        $this->published_at = $dto->publishedAt->startOfMinute();
        $this->is_draft = $dto->isDraft;
        $this->blocks = $dto->blocks;
        $this->preview_image_id = new FileId($dto->previewImageId);
        $this->preview_image_type = $dto->previewImageType;

        if ($this->id->value === null) {
            $this->created_by = new UserId(Auth::id());
        }

        $this->updated_by = new UserId(Auth::id());

        $this->save();

        return $this;
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
     * @param  Collection<int, TagModel>  $tags
     * @return Collection<int, PostModel>
     */
    public function getSimilarByTag(PostId $postId, Collection $tags): Collection
    {
        return $this->newQuery()
            ->select(['title', 'preview', 'published_at', 'id'])
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

    public function findManyById(PostId ...$id): Collection
    {
        return $this->newQuery()
            ->whereIn($this->getKeyName(), $id)
            ->get();
    }
}

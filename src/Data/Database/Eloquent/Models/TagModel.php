<?php

namespace App\Data\Database\Eloquent\Models;

use App\Data\Database\Eloquent\Casts\TagIdCast;
use App\Data\Database\Eloquent\Casts\TagSlugCast;
use App\Data\Database\Eloquent\Casts\UserIdCast;
use App\Domains\Blog\Contracts\Repositories\TagRepositoryContract;
use App\Domains\Blog\ValueObjects\TagId;
use App\Domains\Blog\ValueObjects\TagSlug;
use App\Domains\User\ValueObjets\UserId;
use Carbon\Carbon;
use Database\Factories\TagFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

/**
 * @property TagId $id
 * @property string $name
 * @property TagSlug $slug
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property UserId $created_by
 * @property UserId $updated_by
 * @property Collection $posts
 */
class TagModel extends Model implements TagRepositoryContract
{
    use HasFactory;

    protected $table = 'tags';

    protected $keyType = TagIdCast::class;

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'name' => 'string',
        'slug' => TagSlugCast::class,
        'created_by' => UserIdCast::class,
        'updated_by' => UserIdCast::class,
    ];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(
            PostModel::class,
            'post_tag',
            'tag_id',
            'post_id',
        );
    }

    /**
     * @return Collection<int, TagModel>
     */
    public function getAll(): Collection
    {
        return $this->newQuery()
            ->get();
    }

    public function create(string $name, TagSlug $slug): TagModel
    {
        $model = new TagModel;

        $model->name = $name;
        $model->slug = $slug;
        $model->created_by = new UserId(Auth::id());
        $model->updated_by = new UserId(Auth::id());

        $model->save();

        return $model;
    }

    public function removeById(TagId $tagId): bool
    {
        return self::destroy($tagId->value) > 0;
    }

    protected static function newFactory(): TagFactory
    {
        return TagFactory::new();
    }

    public function updateById(TagId $tagId, string $name, TagSlug $slug): TagModel
    {
        /** @var TagModel $model */
        $model = $this->newQuery()->findOrFail($tagId->value);

        $model->name = $name;
        $model->slug = $slug;
        $model->updated_by = new UserId(Auth::id());

        return $model;
    }

    public function slugExists(TagSlug $slug): bool
    {
        return $this->newQuery()
            ->where('slug', $slug->value)
            ->exists();
    }

    public function findById(TagId $tagId): TagModel
    {
        return $this->newQuery()
            ->findOrFail($tagId->value);
    }

    public function getAllWithPostsCount(): Collection
    {
        return $this->newQuery()
            ->withCount('posts')
            ->get();
    }

    public function searchByNameOrSlug(string $name, TagSlug $slug): Collection
    {
        if ($name === '') {
            return $this->newQuery()
                ->get();
        }

        return $this->newQuery()
            ->where(fn (Builder $q) => $q
                ->where('name', 'like', $name.'%')
                ->orWhere('slug', 'like', $slug->value.'%')
            )
            ->get();

    }

    public function findManyById(TagId ...$tagId): Collection
    {
        return $this->newQuery()
            ->whereIn($this->getKeyName(), $tagId)
            ->get();
    }

    public function findBySlug(TagSlug $tagId): ?TagModel
    {
        return $this->newQuery()
            ->where('slug', '=', $tagId->value)
            ->first();
    }
}

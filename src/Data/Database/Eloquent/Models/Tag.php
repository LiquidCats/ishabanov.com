<?php

namespace App\Data\Database\Eloquent\Models;

use App\Domains\Blog\Contracts\Repositories\TagRepositoryContract;
use App\Domains\Blog\ValueObjects\TagId;
use App\Domains\Blog\ValueObjects\TagSlug;
use Carbon\Carbon;
use Database\Factories\TagFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * @property string $name
 * @property string $slug
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 */
class Tag extends Model implements TagRepositoryContract
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
    ];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    /**
     * @return Collection<int, Tag>
     */
    public function getAll(): Collection
    {
        return $this->newQuery()
            ->get();
    }

    public function create(string $name, ?string $slug): Tag
    {
        $model = new Tag();

        $model->name = $name;
        $model->slug = $slug ?: Str::of($name)
            ->lower()
            ->slug()
            ->toString();

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

    public function updateById(TagId $tagId, string $name, ?string $slug): Tag
    {
        /** @var Tag $model */
        $model = $this->newQuery()->findOrFail($tagId->value);

        $model->name = $name;
        $model->slug = $slug ?: Str::of($name)
            ->lower()
            ->slug()
            ->toString();

        return $model;
    }

    public function slugExists(TagSlug $slug): bool
    {
        return $this->newQuery()
            ->where('slug', $slug->value)
            ->exists();
    }

    public function findById(TagId $tagId): Tag
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
}

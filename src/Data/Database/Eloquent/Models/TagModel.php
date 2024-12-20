<?php

namespace App\Data\Database\Eloquent\Models;

use App\Data\Database\Eloquent\Casts\TagIdCast;
use App\Data\Database\Eloquent\Casts\TagSlugCast;
use App\Data\Database\Eloquent\Casts\UserIdCast;
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

/**
 * @property TagId $id
 * @property string $name
 * @property TagSlug $slug
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property UserId $created_by
 * @property UserId $updated_by
 * @property Collection $posts
 *
 * @method TagId getKey()
 *
 * @mixin Builder
 *
 * @method static TagModel query()
 */
class TagModel extends Model
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

    protected static function newFactory(): TagFactory
    {
        return TagFactory::new();
    }
}

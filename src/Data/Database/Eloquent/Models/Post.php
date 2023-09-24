<?php

namespace App\Data\Database\Eloquent\Models;

use Carbon\Carbon;
use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

/**
 * @property string $title
 * @property string $content
 * @property int $author_id
 * @property bool $is_draft
 * @property Carbon|null $published_at
 * @property User|null $author
 * @property Collection<int, Tag> $tags
 */
class Post extends Model
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
}

<?php

namespace App\Data\Database\Eloquent\Models;

use Carbon\Carbon;
use Database\Factories\TagFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $name
 * @property string $slug
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 */
class Tag extends Model
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

    protected static function newFactory(): TagFactory
    {
        return TagFactory::new();
    }
}

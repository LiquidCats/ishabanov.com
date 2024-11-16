<?php

namespace App\Data\Database\Eloquent\Models;

use App\Data\Database\Eloquent\Casts\UserIdCast;
use App\Domains\User\Contracts\Repositories\UserRepositoryContract;
use App\Domains\User\ValueObjets\UserId;
use Carbon\Carbon;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;
use SensitiveParameterValue;

use function decrypt;
use function encrypt;

/**
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property SensitiveParameterValue $g2fa_secret
 *
 * @property-read Collection<PostModel> $posts
 *
 * @method UserId getKey()
 */
class UserModel extends User implements UserRepositoryContract
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $keyType = UserIdCast::class;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'g2fa_secret',
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $guarded = [
        'password',
    ];

    /**
     * Interact with the user's first name.
     */
    protected function g2faSecret(): Attribute
    {
        return new Attribute(
            get: fn (?string $value) => $value === null ? new SensitiveParameterValue(null) : new SensitiveParameterValue(decrypt($value)),
            set: fn (SensitiveParameterValue $value) => encrypt($value->getValue()),
        );
    }

    public function posts(): HasMany
    {
        return $this->hasMany(PostModel::class, 'created_by', 'id');
    }

    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }

    /**
     * @return LengthAwarePaginator<self>
     */
    public function getLatest(int $perPage = 15): LengthAwarePaginator
    {
        return self::query()
            ->select(['id', 'name', 'email', 'email_verified_at'])
            ->withCount('posts')
            ->latest()
            ->paginate($perPage);
    }

    public function getById(UserId $id): UserModel
    {
        return $this->newQuery()
            ->select(['id', 'name', 'email', 'email_verified_at', 'g2fa_secret'])
            ->withCount('posts')
            ->with('posts', fn (HasMany $q) => $q->limit(3))
            ->findOrFail($id->value);
    }
}

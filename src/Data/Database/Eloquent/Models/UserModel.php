<?php

namespace App\Data\Database\Eloquent\Models;

use App\Data\Database\Eloquent\Casts\UserIdCast;
use App\Domains\User\Contracts\Repositories\UserRepository;
use Carbon\Carbon;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use function encrypt;

/**
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property string|null $g2fa_secret
 */
class UserModel extends User implements UserRepository
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
            get: fn (string $value) => decrypt($value),
            set: fn (string $value) => encrypt($value),
        );
    }

    public function posts(): HasMany
    {
        return $this->hasMany(PostModel::class, 'author_id', 'id');
    }

    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }
}

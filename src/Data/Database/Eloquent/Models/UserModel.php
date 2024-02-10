<?php

namespace App\Data\Database\Eloquent\Models;

use App\Domains\User\Contracts\Repositories\UserRepository;
use App\Domains\User\Dto\UserDto;
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

    /**
     * @throws IncompatibleWithGoogleAuthenticatorException
     * @throws SecretKeyTooShortException
     * @throws InvalidCharactersException
     */
    public function create(UserDto $userDto): UserModel
    {
        $model = new UserModel();

        $model->name = $userDto->name;
        $model->email = $userDto->email;
        $model->password = encrypt($userDto->password);

        /** @var Google2FA $google2fa */
        $google2fa = app('pragmarx.google2fa');

        $model->g2fa_secret = $google2fa->generateSecretKey();

        $model->save();

        return $model;
    }
}

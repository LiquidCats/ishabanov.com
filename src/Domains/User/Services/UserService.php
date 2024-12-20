<?php

declare(strict_types=1);

namespace App\Domains\User\Services;

use App\Data\Database\Eloquent\Models\UserModel;
use App\Domains\User\Contracts\Services\UserServiceContract;
use App\Domains\User\Dto\UserDto;
use App\Domains\User\ValueObjets\UserId;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Validation\ValidationException;
use LiquidCats\G2FA\Exceptions\G2FAException;
use LiquidCats\G2FA\TOTP;
use LiquidCats\G2FA\ValueObjects\SecretKey;
use SensitiveParameterValue;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use function bcrypt;
use function json_decode;
use const JSON_THROW_ON_ERROR;

readonly class UserService implements UserServiceContract
{
    public function __construct(
        private Guard $guard,
        private Hasher $hasher,
        private TOTP $otp,
    ) {}

    public function paginate(): LengthAwarePaginator
    {
        return UserModel::query()
            ->select(['id', 'name', 'email', 'email_verified_at'])
            ->withCount('posts')
            ->latest('id')
            ->paginate();
    }

    public function getUser(UserId $userId): UserModel
    {
        /** @var UserModel $result */
        $result = UserModel::query()
            ->select([
                'id',
                'name',
                'email',
                'email_verified_at',
            ])
            ->withCount('posts')
            ->with('posts', fn (HasMany $q) => $q
                ->limit(3)
                ->select([
                    'id',
                    'title',
                    'is_draft',
                    'created_by',
                    'created_at',
                    'updated_at',
                    'published_at',
                ])
            )
            ->findOrFail($userId->value);

        return $result;
    }

    public function createUser(UserDto $dto): UserModel
    {
        $model = new UserModel;

        $model->name = $dto->name;
        $model->email = $dto->email;
        $model->password = bcrypt($dto->password);

        $model->save();

        return $model;
    }

    /**
     * @param UserId  $userId
     * @param UserDto $dto
     *
     * @return UserModel
     * @throws G2FAException
     * @throws ValidationException
     */
    public function updatePassword(UserId $userId, UserDto $dto): UserModel
    {
        $currentUser = $this->getCurrentUser();

        if (! $this->otp->verify($currentUser->g2fa_secret, $dto->otpCode)) {
            throw ValidationException::withMessages([]);
        }

        if ($userId->equals($currentUser->getKey())) {
            if (! $this->hasher->check($dto->password, $currentUser->password)) {
                throw ValidationException::withMessages([]);
            }
        }

        $currentUser->password = bcrypt($dto->password);
        $currentUser->save();

        return $currentUser;
    }

    public function verifyUser(UserId $userId): UserModel
    {
        if ($userId->equals($this->getCurrentUser()->getKey())) {
            throw new NotFoundHttpException('cant verify own account');
        }

        /** @var UserModel $user */
        $user = UserModel::query()->findOrFail($userId->value);
        $user->email_verified_at = $user->email_verified_at === null
            ? Carbon::now()
            : null;

        $user->save();

        return $user;
    }

    public function deleteUser(UserId $userId): UserModel
    {
        if ($userId->equals($this->getCurrentUser()->getKey())) {
            throw new NotFoundHttpException('cant delete own account');
        }

        /** @var UserModel $user */
        $user = UserModel::query()->findOrFail($userId->value);

        $user->delete();

        return $user;
    }

    private function getCurrentUser(): UserModel
    {
        /** @var UserModel $user */
        $user = $this->guard->user();
        if ($user === null) {
            throw new NotFoundHttpException('not found');
        }

        return $user;
    }
}

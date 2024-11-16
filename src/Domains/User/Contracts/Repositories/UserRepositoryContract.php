<?php

declare(strict_types=1);

namespace App\Domains\User\Contracts\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserRepositoryContract
{
    public function getLatest(int $perPage = 15): LengthAwarePaginator;
}

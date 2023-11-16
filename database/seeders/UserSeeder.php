<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Data\Database\Eloquent\Models\UserModel;
use Illuminate\Database\Seeder;
use function app;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        if (app()->environment('production')) {
            return;
        }
        $user = UserModel::find(1);
        if ($user === null) {
            UserModel::factory()->create();
        }
    }
}

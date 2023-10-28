<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Data\Database\Eloquent\Models\User;
use Illuminate\Database\Seeder;
use function app;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        if (app()->environment('production')) {
            return;
        }
        $user = User::find(1);
        if ($user === null) {
            User::factory()->create();
        }
    }
}

<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        (new ToolSeeder)->run();
        (new ExperienceSeeder)->run();
        (new ExperienceToolSeeder)->run();
    }
}

<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Data\Database\Eloquent\Models\ExperienceToolModel;
use App\Foundation\Enums\ExperienceLevel;
use Illuminate\Database\Seeder;

class ExperienceToolSeeder extends Seeder
{
    /**
     * @var array[]
     */
    protected static array $values = [
        [1,     'php',                  ExperienceLevel::JUNIOR],
        [1,     'javascript',           ExperienceLevel::JUNIOR],
        [1,     'vue',                  ExperienceLevel::JUNIOR],
        [1,     'mysql',                ExperienceLevel::JUNIOR],
        //
        [2,     'php',                  ExperienceLevel::MIDDLE],
        [2,     'laravel',              ExperienceLevel::MIDDLE],
        [2,     'react',                ExperienceLevel::JUNIOR],
        [2,     'javascript',           ExperienceLevel::MIDDLE],
        [2,     'rabbitmq',             ExperienceLevel::JUNIOR],
        [2,     'mssql',                ExperienceLevel::MIDDLE],
        [2,     'docker',               ExperienceLevel::JUNIOR],
        [2,     'redis',                ExperienceLevel::JUNIOR],
        //
        [3,     'laravel',              ExperienceLevel::SENIOR],
        [3,     'php',                  ExperienceLevel::SENIOR],
        [3,     'nodejs',               ExperienceLevel::MIDDLE],
        [3,     'golang',               ExperienceLevel::JUNIOR],
        [3,     'kafka',                ExperienceLevel::JUNIOR],
        [3,     'nginx',                ExperienceLevel::MIDDLE],
        [3,     'docker',               ExperienceLevel::SENIOR],
        [3,     'crypto_nodes',         ExperienceLevel::MIDDLE],
        [3,     'kubernetes',           ExperienceLevel::JUNIOR],
        [3,     'postgresql',           ExperienceLevel::MIDDLE],
        //
        [4,     'php',                  ExperienceLevel::SENIOR],
        [4,     'laravel',              ExperienceLevel::SENIOR],
        [4,     'sqs',                  ExperienceLevel::MIDDLE],
        [4,     'redis',                ExperienceLevel::SENIOR],
        [4,     'postgresql',           ExperienceLevel::SENIOR],
        [4,     'docker',               ExperienceLevel::SENIOR],
        [4,     'bitbucket_pipelines',  ExperienceLevel::MIDDLE],
        //
        [5,     'php',                  ExperienceLevel::SENIOR],
        [5,     'laravel',              ExperienceLevel::SENIOR],
        [5,     'rabbitmq',             ExperienceLevel::SENIOR],
        [5,     'github_actions',       ExperienceLevel::SENIOR],
        [5,     'redis',                ExperienceLevel::SENIOR],
        [5,     'mysql',                ExperienceLevel::SENIOR],
        [5,     'docker',               ExperienceLevel::SENIOR],
        //
        [6,     'php',                  ExperienceLevel::SENIOR],
        [6,     'laravel',              ExperienceLevel::SENIOR],
        [6,     'rabbitmq',             ExperienceLevel::SENIOR],
        [6,     'redis',                ExperienceLevel::SENIOR],
        [6,     'mysql',                ExperienceLevel::SENIOR],
        [6,     'docker',               ExperienceLevel::SENIOR],
        [6,     'golang',               ExperienceLevel::SENIOR],

    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ExperienceToolModel::query()->truncate();

        /**
         * @var int $experienceId
         * @var string $toolId
         * @var ExperienceLevel $level
         */
        foreach (self::$values as [$experienceId, $toolId, $level]) {
            $this->createModel($experienceId, $toolId, $level);
        }
    }

    protected function createModel(int $experienceId, string $toolId, ExperienceLevel $level): void
    {
        $model = new ExperienceToolModel;

        $model->experience_id = $experienceId;
        $model->tool_id = $toolId;
        $model->level_id = $level;

        $model->save();
    }
}

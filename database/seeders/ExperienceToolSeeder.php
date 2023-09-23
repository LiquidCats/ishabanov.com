<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Data\Database\Eloquent\Models\ExperienceTool;
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
        // /
        [2,     'php',                  ExperienceLevel::MIDDLE],
        [2,     'laravel',              ExperienceLevel::MIDDLE],
        [2,     'react',                ExperienceLevel::JUNIOR],
        [2,     'javascript',           ExperienceLevel::MIDDLE],
        [2,     'rabbitmq',             ExperienceLevel::JUNIOR],
        [2,     'mssql',                ExperienceLevel::MIDDLE],
        [2,     'docker',               ExperienceLevel::JUNIOR],
        [2,     'redis',                ExperienceLevel::JUNIOR],
        // /
        [3,     'php',                  ExperienceLevel::SENIOR],
        [3,     'laravel',              ExperienceLevel::SENIOR],
        [3,     'react',                ExperienceLevel::MIDDLE],
        [3,     'javascript',           ExperienceLevel::MIDDLE],
        [3,     'rabbitmq',             ExperienceLevel::MIDDLE],
        [3,     'mssql',                ExperienceLevel::MIDDLE],
        [3,     'docker',               ExperienceLevel::MIDDLE],
        [3,     'redis',                ExperienceLevel::MIDDLE],
        // /
        [4,     'laravel',              ExperienceLevel::SENIOR],
        [4,     'php',                  ExperienceLevel::SENIOR],
        [4,     'nodejs',               ExperienceLevel::MIDDLE],
        [4,     'golang',               ExperienceLevel::JUNIOR],
        [4,     'kafka',                ExperienceLevel::JUNIOR],
        [4,     'nginx',                ExperienceLevel::MIDDLE],
        [4,     'docker',               ExperienceLevel::SENIOR],
        [4,     'crypto_nodes',         ExperienceLevel::MIDDLE],
        [4,     'kubernetes',           ExperienceLevel::JUNIOR],
        [4,     'postgresql',           ExperienceLevel::MIDDLE],
        // /
        [5,     'php',                  ExperienceLevel::SENIOR],
        [5,     'laravel',              ExperienceLevel::SENIOR],
        [5,     'sqs',                  ExperienceLevel::MIDDLE],
        [5,     'redis',                ExperienceLevel::SENIOR],
        [5,     'postgresql',           ExperienceLevel::SENIOR],
        [5,     'docker',               ExperienceLevel::SENIOR],
        [5,     'bitbucket_pipelines',  ExperienceLevel::MIDDLE],
        // /
        [6,     'php',                  ExperienceLevel::SENIOR],
        [6,     'laravel',              ExperienceLevel::SENIOR],
        [6,     'rabbitmq',             ExperienceLevel::SENIOR],
        [6,     'github_actions',       ExperienceLevel::SENIOR],
        [6,     'redis',                ExperienceLevel::SENIOR],
        [6,     'mysql',                ExperienceLevel::SENIOR],
        [6,     'docker',               ExperienceLevel::SENIOR],
        // /
        [7,     'php',                  ExperienceLevel::SENIOR],
        [7,     'laravel',              ExperienceLevel::SENIOR],
        [7,     'rabbitmq',             ExperienceLevel::SENIOR],
        [7,     'redis',                ExperienceLevel::SENIOR],
        [7,     'mysql',                ExperienceLevel::SENIOR],
        [7,     'docker',               ExperienceLevel::SENIOR],
        [7,     'golang',               ExperienceLevel::SENIOR],

    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ExperienceTool::query()->truncate();

        /**
         * @var int             $experienceId
         * @var string          $toolId
         * @var ExperienceLevel $level
         */
        foreach (self::$values as [$experienceId, $toolId, $level]) {
            $this->createModel($experienceId, $toolId, $level);
        }
    }

    protected function createModel(int $experienceId, string $toolId, ExperienceLevel $level): void
    {
        $model = new ExperienceTool();

        $model->experience_id = $experienceId;
        $model->tool_id = $toolId;
        $model->level_id = $level;

        $model->save();
    }
}

<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use ishabanov\Core\Domain\Enums\ToolType;
use ishabanov\Core\Domain\Enums\{
    ExperienceLevel};
use ishabanov\Core\Infrastructure\Eloquent\Models\Tool;

class ToolSeeder extends Seeder
{
    protected static array $values = [
        ['PHP', ToolType::LANGUAGE, ExperienceLevel::SENIOR],
        ['NodeJS', ToolType::LANGUAGE, ExperienceLevel::MIDDLE],
        ['GoLang', ToolType::LANGUAGE, ExperienceLevel::MIDDLE],
        ['JavaScript', ToolType::LANGUAGE, ExperienceLevel::SENIOR],

        ['Laravel', ToolType::FRAMEWORK, ExperienceLevel::SENIOR],
        ['React', ToolType::FRAMEWORK, ExperienceLevel::MIDDLE],
        ['Vue', ToolType::FRAMEWORK, ExperienceLevel::MIDDLE],

        ['RabbitMQ', ToolType::QUEUE, ExperienceLevel::SENIOR],
        ['SQS', ToolType::QUEUE, ExperienceLevel::MIDDLE],
        ['Kafka', ToolType::QUEUE, ExperienceLevel::MIDDLE],

        ['Redis', ToolType::DATABASE, ExperienceLevel::SENIOR],
        ['PostgreSQL', ToolType::DATABASE, ExperienceLevel::SENIOR],
        ['MySQL', ToolType::DATABASE, ExperienceLevel::SENIOR],
        ['MSSQL', ToolType::DATABASE, ExperienceLevel::MIDDLE],

        ['Nginx', ToolType::TOOL, ExperienceLevel::MIDDLE],
        ['Docker', ToolType::TOOL, ExperienceLevel::SENIOR],
        ['Crypto Nodes', ToolType::TOOL, ExperienceLevel::MIDDLE],

        ['kubernetes', ToolType::DEPLOY, ExperienceLevel::MIDDLE],
        ['Jenkins', ToolType::DEPLOY, ExperienceLevel::MIDDLE],
        ['GitHub Actions', ToolType::DEPLOY, ExperienceLevel::MIDDLE],
        ['Bitbucket Pipelines', ToolType::DEPLOY, ExperienceLevel::MIDDLE],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tool::query()->truncate();

        foreach (self::$values as $tool) {
            $this->createModel(...$tool);
        }
    }

    protected function createModel(string $name, ?ToolType $type, ExperienceLevel $level = null): void
    {
        $model = new Tool();

        $model->id = Str::of($name)
            ->lower()
            ->snake()
            ->toString();
        $model->name = $name;
        $model->type = $type;
        $model->level = $level;

        $model->save();
    }
}

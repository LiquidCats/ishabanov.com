<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Data\Database\Eloquent\Models\ExperienceModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ExperienceModel>
 */
class ExperienceFactory extends Factory
{
    protected $model = ExperienceModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => \fake()->domainName(),
            'company_url' => \fake()->url(),
            'company_logo' => 'images/experience/'.\fake()->word().'.svg',
            'position' => \fake()->jobTitle(),
            'description' => \fake()->text,
            'started_at' => Carbon::parse(\fake()->date()),
            'ended_at' => Carbon::parse(\fake()->date()),
        ];
    }
}

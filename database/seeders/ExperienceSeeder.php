<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Data\Database\Eloquent\Models\ExperienceModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ExperienceModel::query()->truncate();

        foreach (array_reverse(self::values()) as $experience) {
            $this->createModel($experience);
        }
    }


    protected function createModel(array $experience): void
    {
        $model = new ExperienceModel();

        $model->id = $experience['id'];
        $model->company_name = $experience['company_name'];
        $model->company_url = $experience['company_url'];
        $model->company_logo = $experience['company_logo'];
        $model->position = $experience['position'];
        $model->description = $experience['description'];
        $model->started_at = Carbon::parse($experience['started_at']);
        if ($experience['ended_at'] !== null) {
            $model->ended_at = Carbon::parse($experience['ended_at']);
        }

        $model->save();
    }

    private static function values(): array
    {
        return [
            [
                'id' => 6,
                'company_name' => 'CoinsPaid',
                'company_url' => 'https://coinspaid.com',
                'company_logo' => 'images/experience/coinspaid.svg',
                'position' => 'Senior Software Engineer',
                'description' => [
                    'Created a clustered derivation mechanism for cryptocurrency addresses.',
                    'Enhanced the security of internal services.',
                    'Improved the architecture of services using the Domain-Driven Design (DDD) approach.',
                ],
                'started_at' => '2022-12-24 00:00:00',
                'ended_at' => null,
            ],
            [
                'id' => 5,
                'company_name' => 'Everli',
                'company_url' => 'https://it.everli.com',
                'company_logo' => 'images/experience/everli.svg',
                'position' => 'Senior Software Engineer',
                'description' => [
                    'Improved and accelerated CI/CD pipelines, reducing the time to feature delivery.',
                    'Researched, described, and integrated a self-documented code approach, enhancing code quality, shortening the feature delivery timeline, and saving funds over the long term.',
                    'Developed a rolling update system for backend features.',
                    'Optimized data storage and enhanced the speed of the search engine.',
                ],
                'started_at' => '2021-11-04 00:00:00',
                'ended_at' => '2022-12-24 00:00:00',
            ],
            [
                'id' => 4,
                'company_name' => 'iMusician',
                'company_url' => 'https://imusician.pro',
                'company_logo' => 'images/experience/imusician.svg',
                'position' => 'Senior Software Engineer',
                'description' => [
                    'Developed a long-term plan for complex refactoring and enhancement of the backend using the Domain-Driven Design (DDD) approach.',
                    'Optimized and improved the CI/CD processes, resulting in reduced delivery times.',
                    'Integrated the Test-Driven Development (TDD) approach within the team, significantly increasing the quality of delivered features.',
                    'Created a music trends parser and aggregator for analytics, which the company now offers as a separate service.',
                ],
                'started_at' => '2020-12-01 00:00:00',
                'ended_at' => '2021-11-04 00:00:00',
            ],
            [
                'id' => 3,
                'company_name' => 'PointPay',
                'company_url' => 'https://pointpay.io',
                'company_logo' => 'images/experience/pointpay.svg',
                'position' => 'Senior Software Engineer',
                'description' => [
                    'Developed a cryptocurrency payment gateway.',
                    'Outlined the principles of building and creating microservices across the entire company.',
                    'Developed and implemented internal infrastructure.',
                    'Integrated tests within CI/CD pipelines.',
                    'Optimized build and deployment processes.',
                ],
                'started_at' => '2019-12-01 00:00:00',
                'ended_at' => '2020-12-01 00:00:00',
            ],
            [
                'id' => 2,
                'company_name' => 'Hemmersbach',
                'company_url' => 'https://hemmersbach.com',
                'company_logo' => 'images/experience/hemmersbach.svg',
                'position' => 'Middle Software Developer',
                'description' => [
                    'Contributed to a team that was among the first to implement Domain-Driven Design (DDD) in PHP.',
                    'Developed a rule-based permissions system and participated in the creation of a system that filters data and hides UI elements based on rules.',
                    'Introduced best practices and structured the approach to front-end development within the company based on these practices.',
                ],
                'started_at' => '2017-12-01 00:00:00',
                'ended_at' => '2019-12-01 00:00:00',
            ],
            [
                'id' => 1,
                'company_name' => 'School2100',
                'company_url' => 'https://school2100.com',
                'company_logo' => 'images/experience/school2100.svg',
                'position' => 'Junior Software Developer',
                'description' => [
                    'Created the backend for a remote education system.',
                    'Developed a frontend for the back-office operations of the remote education system.',
                ],
                'started_at' => '2016-12-01 00:00:00',
                'ended_at' => '2017-12-01 00:00:00',
            ],
        ];
    }
}

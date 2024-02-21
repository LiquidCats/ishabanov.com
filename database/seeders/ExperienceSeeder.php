<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Data\Database\Eloquent\Models\ExperienceModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{

    protected static array $values = [
        [
            'id' => 6,
            'company_name' => 'CoinsPaid',
            'company_url' => 'https://coinspaid.com',
            'company_logo' => 'images/experience/coinspaid.svg',
            'position' => 'Senior Software Engineer',
            'description' => '<h3 class="text-sm text-gray-400">Personal Achievements:</h3><ul class="list-inside list-none space-y-2"><li class="flex gap-1"><div class="py-1.5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></div><div>Created a clustered derivation mechanism for cryptocurrency addresses.</div></li><li class="flex gap-1"><div class="py-1.5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></div><div>Enhanced the security of internal services.</div></li><li class="flex gap-1"><div class="py-1.5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></div><div>Improved the architecture of services using the Domain-Driven Design (DDD) approach.</div></li></ul>',
            'started_at' => '2022-12-24 00:00:00',
            'ended_at' => null,
        ],
        [
            'id' => 5,
            'company_name' => 'Everli',
            'company_url' => 'https://it.everli.com',
            'company_logo' => 'images/experience/everli.svg',
            'position' => 'Senior Software Engineer',
            'description' => '<h3 class="text-sm text-gray-400">Personal Achievements:</h3><ul class="list-inside list-none space-y-2"><li class="flex gap-1"><div class="py-1.5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></div><div>Improved and accelerated CI/CD pipelines, reducing the time to feature delivery.</div></li><li class="flex gap-1"><div class="py-1.5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></div><div>Researched, described, and integrated a self-documented code approach, enhancing code quality, shortening the feature delivery timeline, and saving funds over the long term.</div></li><li class="flex gap-1"><div class="py-1.5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></div><div>Developed a rolling update system for backend features.</div></li><li class="flex gap-1"><div class="py-1.5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></div><div>Optimized data storage and enhanced the speed of the search engine.</div></li></ul>',
            'started_at' => '2021-11-04 00:00:00',
            'ended_at' => '2022-12-24 00:00:00',
        ],
        [
            'id' => 4,
            'company_name' => 'iMusician',
            'company_url' => 'https://imusician.pro',
            'company_logo' => 'images/experience/imusician.svg',
            'position' => 'Senior Software Engineer',
            'description' => '<h3 class="text-sm text-gray-400">Personal Achievements:</h3><ul class="list-inside list-none space-y-2"><li class="flex gap-1"><div class="py-1.5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></div><div>Developed a long-term plan for complex refactoring and enhancement of the backend using the Domain-Driven Design (DDD) approach.</div></li><li class="flex gap-1"><div class="py-1.5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></div><div>Optimized and improved the CI/CD processes, resulting in reduced delivery times.</div></li><li class="flex gap-1"><div class="py-1.5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></div><div>Integrated the Test-Driven Development (TDD) approach within the team, significantly increasing the quality of delivered features.</div></li><li class="flex gap-1"><div><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></div><div>Created a music trends parser and aggregator for analytics, which the company now offers as a separate service.</div></li></ul>',
            'started_at' => '2020-12-01 00:00:00',
            'ended_at' => '2021-11-04 00:00:00',
        ],
        [
            'id' => 3,
            'company_name' => 'PointPay',
            'company_url' => 'https://pointpay.io',
            'company_logo' => 'images/experience/pointpay.svg',
            'position' => 'Senior Software Engineer',
            'description' => '<h3 class="text-sm text-gray-400">Personal Achievements:</h3><ul class="list-inside list-none space-y-2"><li class="flex gap-1"><div class="py-1.5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></div><div>Developed a cryptocurrency payment gateway.</div></li><li class="flex gap-1"><div class="py-1.5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></div><div>Outlined the principles of building and creating microservices across the entire company.</div></li><li class="flex gap-1"><div class="py-1.5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></div><div>Developed and implemented internal infrastructure.</div></li><li class="flex gap-1"><div class="py-1.5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></div><div>Integrated tests within CI/CD pipelines.</div></li><li class="flex gap-1"><div class="py-1.5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></div><div>Optimized build and deployment processes.</div></li></ul>',
            'started_at' => '2019-12-01 00:00:00',
            'ended_at' => '2020-12-01 00:00:00',
        ],
        [
            'id' => 2,
            'company_name' => 'Hemmersbach',
            'company_url' => 'https://hemmersbach.com',
            'company_logo' => 'images/experience/hemmersbach.svg',
            'position' => 'Middle Software Developer',
            'description' => '<h3 class="text-sm text-gray-400">Personal Achievements:</h3><ul class="list-inside list-none space-y-2"><li class="flex gap-1"><div class="py-1.5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></div><div>Contributed to a team that was among the first to implement Domain-Driven Design (DDD) in PHP.</div></li><li class="flex gap-1"><div class="py-1.5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></div><div>Developed a rule-based permissions system and participated in the creation of a system that filters data and hides UI elements based on rules.</div></li><li class="flex gap-1"><div class="py-1.5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></div><div>Introduced best practices and structured the approach to front-end development within the company based on these practices.</div></li></ul>',
            'started_at' => '2017-12-01 00:00:00',
            'ended_at' => '2019-12-01 00:00:00',
        ],
        [
            'id' => 1,
            'company_name' => 'School2100',
            'company_url' => 'https://school2100.com',
            'company_logo' => 'images/experience/school2100.svg',
            'position' => 'Junior Software Developer',
            'description' => '<h3 class="text-sm text-gray-400">Personal Achievements:</h3><ul class="list-inside list-none space-y-2"><li class="flex gap-1"><div class="py-1.5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></div><div>Created the backend for a remote education system.</div></li><li class="flex gap-1"><div class="py-1.5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></div><div>Developed a frontend for the back-office operations of the remote education system.</div></li></ul>',
            // 'd' => [
            //     [
            //         'type' => 'h3',
            //         'class' => 'text-sm text-gray-400',
            //         'text' => 'Personal Achievements:',
            //     ],
            //     [
            //         'type' => 'ul',
            //         'class' => 'list-inside list-none space-y-2',
            //         'list' => [
            //             [
            //                 'icon' => 'chevron-right',
            //                 'text' => 'Created the backend for a remote education system.',
            //             ],
            //         ],
            //     ],
            // ],
            'started_at' => '2016-12-01 00:00:00',
            'ended_at' => '2017-12-01 00:00:00',
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ExperienceModel::query()->truncate();

        foreach (array_reverse(self::$values) as $experience) {
            $this->createModel($experience);
        }
    }

    /**
     * @param  array<string, string>  $experience
     */
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
}

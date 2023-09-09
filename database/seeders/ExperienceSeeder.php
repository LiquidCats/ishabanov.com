<?php

declare(strict_types=1);

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use ishabanov\Core\Infrastructure\Eloquent\Models\Experience;

class ExperienceSeeder extends Seeder
{
    protected static array $values = [
        [
            'id' => 7,
            'company_name' => 'coinspaid.com',
            'company_url' => 'https://coinspaid.com',
            'company_logo' => 'images/experience/coinspaid.svg',
            'position' => 'Senior Software Engineer',
            'description' => 'As a developer here, I designed and implemented software solutions for the payment gateway and cryptocurrency wallet services. I wrote clean, maintainable code, conducting code reviews and debugging, identified opportunities for improvement, and mentored junior engineers. I collaborated with stakeholders to define requirements, prioritize features, and plan releases. The role challenged me to innovate with new technologies and contribute to shaping the future of the cryptocurrency industry.',
            'started_at' => '2021-11-04 00:00:00',
            'ended_at' => '2022-12-24 00:00:00',
        ],
        [
            'id' => 6,
            'company_name' => 'everli.com',
            'company_url' => 'https://it.everli.com',
            'company_logo' => 'images/experience/everli.svg',
            'position' => 'Senior Software Engineer',
            'description' => 'Here I was involved in microservices architecture improvement and development. It is an application for grocery orders and delivery. My responsibility here is pretty the same with previous, I am trying to improve the services architecture and communication and interaction between them. I took a whole responsibility for one of the microservices -- a product search engine based on ElasticSearch.',
            'started_at' => '2021-11-04 00:00:00',
            'ended_at' => '2022-12-24 00:00:00',
        ],
        [
            'id' => 5,
            'company_name' => 'imusician.pro',
            'company_url' => 'https://imusician.pro',
            'company_logo' => 'images/experience/imusician.svg',
            'position' => 'Senior Software Engineer',
            'description' => 'Here I was working on improving a backend part of the application. That was an application for music creators and distributors who want to simplify the process of music release on streaming services. Based on its specific there was decided to implement Domain Driven and start refactoring the application backend based on this approach. So, my main responsibility here was to lead refactoring and consult the team on best practices in Domain Driven.',
            'started_at' => '2020-12-01 00:00:00',
            'ended_at' => '2021-11-04 00:00:00',
        ],
        [
            'id' => 4,
            'company_name' => 'pointpay.io',
            'company_url' => 'https://pointpay.io',
            'company_logo' => 'images/experience/pointpay.svg',
            'position' => 'Senior Software Engineer',
            'description' => 'It was my first start-up experience. Here I was developing a payment management solution for separate crypto-currencies. It is one of the main parts of internal microservices architecture. Additionally, I was working on establishing and improving workflows and developing processes.',
            'started_at' => '2019-12-01 00:00:00',
            'ended_at' => '2020-12-01 00:00:00',
        ],
        [
            'id' => 3,
            'company_name' => 'hemmersbach.com',
            'company_url' => 'https://hemmersbach.com',
            'company_logo' => 'images/experience/hemmersbach.svg',
            'position' => 'Senior Software Developer',
            'description' => 'After one year I was promoted up to the senior level. As a result, I can concentrate not only on building the application but improving company processes. There were integrated testing steps inside of the workflow, established QA department, improved CI/CD process, etc.',
            'started_at' => '2018-12-01 00:00:00',
            'ended_at' => '2019-12-01 00:00:00',
        ],
        [
            'id' => 2,
            'company_name' => 'hemmersbach.com',
            'company_url' => 'https://hemmersbach.com',
            'company_logo' => 'images/experience/hemmersbach.svg',
            'position' => 'Middle Software Developer',
            'description' => 'Hemmersbach was one of my great working experiences. There were three developer teams: Russian, Polish, and German. I was involved in refactoring from scratch one of the internal tool for project management (kind of CRM) here inside of the Russian team. We were free to choose technologies and architectures. As a result, we concentrated on building an application based on the best practices.',
            'started_at' => '2017-12-01 00:00:00',
            'ended_at' => '2018-12-01 00:00:00',
        ],
        [
            'id' => 1,
            'company_name' => 'school2100.com',
            'company_url' => 'https://school2100.com',
            'company_logo' => 'images/experience/school2100.svg',
            'position' => 'Junior Software Developer',
            'description' => 'That was my first experience in enterprise development. This project was dedicated to remote education, electronic books, and tutoring. I was involved in the development of three projects: a platform for remote education, an electronic books platform, and the main news portal. Here we had a big team, but there was rather weak communication, mostly I should develop everything by myself. However here I got big experience in front and backend development.',
            'started_at' => '2016-12-01 00:00:00',
            'ended_at' => '2017-12-01 00:00:00',
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Experience::query()->truncate();

        foreach (array_reverse(self::$values) as $experience) {
            $this->createModel($experience);
        }
    }

    /**
     * @param array<string, string> $experience
     */
    protected function createModel(array $experience): void
    {
        $model = new Experience();

        $model->id = $experience['id'];
        $model->company_name = $experience['company_name'];
        $model->company_url = $experience['company_url'];
        $model->company_logo = $experience['company_logo'];
        $model->position = $experience['position'];
        $model->description = $experience['description'];
        $model->started_at = Carbon::parse($experience['started_at']);
        $model->ended_at = Carbon::parse($experience['ended_at']);

        $model->save();
    }
}

<?php

namespace Database\Seeders;

use App\Data\Models\Experience;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $model = new Experience();

        $model->company_name = 'everli.com';
        $model->company_url = 'https://it.everli.com';
        $model->company_logo = 'images/experience/everli.svg';
        $model->position = 'Senior Software Engineer';
        $model->description = '';
        $model->started_at = Carbon::parse('2021-11-04');
        $model->ended_at = null;

        $model->save();

        $model = new Experience();

        $model->company_name = 'imusician.pro';
        $model->company_url = 'https://imusician.pro';
        $model->company_logo = 'images/experience/imusician.svg';
        $model->position = 'Senior Software Engineer';
        $model->description = '';
        $model->started_at = Carbon::parse('2020-12-01');
        $model->ended_at = Carbon::parse('2021-11-04');

        $model->save();

        $model = new Experience();

        $model->company_name = 'pointpay.io';
        $model->company_url = 'https://pointpay.io';
        $model->company_logo = 'images/experience/pointpay.svg';
        $model->position = 'Senior Software Engineer';
        $model->description = '';
        $model->started_at = Carbon::parse('2019-12-01');
        $model->ended_at = Carbon::parse('2020-12-01');

        $model->save();

        $model = new Experience();

        $model->company_name = 'hemmersbach.com';
        $model->company_url = 'https://hemmersbach.com';
        $model->company_logo = 'images/experience/hemmersbach.svg';
        $model->position = 'Senior Software Developer';
        $model->description = '';
        $model->started_at = Carbon::parse('2018-12-01');
        $model->ended_at = Carbon::parse('2019-12-01');

        $model->save();

        $model = new Experience();

        $model->company_name = 'hemmersbach.com';
        $model->company_url = 'https://hemmersbach.com';
        $model->company_logo = 'images/experience/hemmersbach.svg';
        $model->position = 'Middle Software Developer';
        $model->description = '';
        $model->started_at = Carbon::parse('2017-12-01');
        $model->ended_at = Carbon::parse('2018-12-01');

        $model->save();

        $model = new Experience();

        $model->company_name = 'school2100.com';
        $model->company_url = 'https://school2100.com';
        $model->company_logo = 'images/experience/school2100.svg';
        $model->position = 'Junior Software Developer';
        $model->description = '';
        $model->started_at = Carbon::parse('2016-12-01');
        $model->ended_at = Carbon::parse('2017-12-01');

        $model->save();
    }
}

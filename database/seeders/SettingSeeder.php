<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;


class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'key'    => 'facebook',
                'label'  => 'Facebook Url' 
            ],
            [
                'key'    => 'instagram',
                'label'  => 'Instagram Url' 
            ]
        ];

        Setting::insert($settings);
    }
}

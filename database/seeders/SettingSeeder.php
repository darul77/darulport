<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $settings = [
            ['key' => 'name', 'value' => 'Elvi Novika Rahma'],
            ['key' => 'job_title', 'value' => 'Perawat & Web Developer'],
            ['key' => 'bio', 'value' => 'Selamat datang di portofolio saya...'],
            ['key' => 'instagram_link', 'value' => 'https://instagram.com/username'],
        ];

        foreach ($settings as $setting) {
            \App\Models\Setting::create($setting);
        }
    }
}

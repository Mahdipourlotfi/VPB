<?php

namespace Database\Seeders;

use App\Models\Settings;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $languages = [
        //     array("فارسی","fa"),
        //     array("English","en"),
        //  ];

        //  foreach ($languages as $lng) {
        //     Language::create(['name' => $lng[0],'value'=>$lng[1]]);
        //  }

        Settings::create(['user_id' => '1', 'settingsitems_id' => '1', 'value' => 'setting1_value']);
        Settings::create(['user_id' => '1', 'settingsitems_id' => '2', 'value' => 'setting2_value']);
    }
}

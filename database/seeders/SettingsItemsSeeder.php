<?php

namespace Database\Seeders;

use App\Models\SettingsItems;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsItemsSeeder extends Seeder
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

        SettingsItems::create(['name' => 'lng', 'type' => 'string']);
        SettingsItems::create(['name' => 'item2', 'type' => 'string']);
    }
}

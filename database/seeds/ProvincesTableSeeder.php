<?php

use Illuminate\Database\Seeder;
use App\Province;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Province::count() == 0) {
            Province::create([
                'name' => 'Battambang'
            ]);

            Province::create([
                'name' => 'Phnom Penh'
            ]);

            Province::create([
                'name' => 'Siem Reap'
            ]);
        }
    }
}

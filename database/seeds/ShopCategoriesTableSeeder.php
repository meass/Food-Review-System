<?php

use Illuminate\Database\Seeder;
use App\ShopCategory;

class ShopCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (ShopCategory::count() == 0) {
            ShopCategory::create([
                'name' => 'Restaurant'
            ]);

            ShopCategory::create([
                'name' => 'Pub'
            ]);

            ShopCategory::create([
                'name' => 'Café'
            ]);
        }
    }
}

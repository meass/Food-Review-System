<?php

use Faker\Generator as Faker;

$factory->define(App\ShopCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

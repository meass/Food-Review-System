<?php

use Faker\Generator as Faker;

$factory->define(App\Franchise::class, function (Faker $faker) {
    return [
        'name' => $faker->name;
    ];
});

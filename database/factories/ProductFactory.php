<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'fraccionable' => $faker->boolean,
        'fecha_vencimiento' => $faker->dateTimeThisYear->format('Y-m-d'),
        'stock' => $faker->numberBetween(0, 100),
        'active' => true,
    ];
});

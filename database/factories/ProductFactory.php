<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'description' => $faker->paragraph(),
        'price' => $faker->randomFloat(2, 5, 200),
        'reference' => $faker->regexify('[A-Z]{16}'),
        'sizes' => $faker->randomElement(['XS', 'S', 'M', 'L', 'XL']),
        'visible' => $faker->randomElement(['published', 'unpublished']),
        'state' => $faker->randomElement(['discount', 'standard'])
    ];
});

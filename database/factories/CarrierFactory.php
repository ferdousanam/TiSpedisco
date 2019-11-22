<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Carrier;
use Faker\Generator as Faker;

$factory->define(Carrier::class, function (Faker $faker) {
    return [
        'title' => $faker->company,
        'logo' => 'images/storage/home-img/' . $faker->image($dir = 'public/images/storage/home-img', $width = 140, $height = 54, 'cats', false, true, 'Faker'),
        'app_key' => Str::random(10),
        'secret_key' => Str::random(10),
    ];
});

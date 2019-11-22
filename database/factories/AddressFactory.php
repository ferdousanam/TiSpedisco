<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'address' => $faker->address,
        'city' => $faker->city,
        'country' => $faker->country,
        'state' => $faker->state,
        'zipCode' => $faker->postcode,
        'phone' => $faker->phoneNumber,
        'user_id' => App\User::all()->random()->id,
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'address_1' => $faker->secondaryAddress,
        'address_2' => $faker->address,
        'city' => $faker->city,
        'country' => $faker->country,
        'state' => $faker->state,
        'province' => $faker->locale,
        'postcode' => $faker->postcode,
        'phone' => $faker->phoneNumber,
        'user_id' => App\User::all()->random()->id,
    ];
});

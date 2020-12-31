<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Distributor;
use Faker\Generator as Faker;

$factory->define(Distributor::class, function (Faker $faker) {
    return [
        'name' => $faker->name, 
        'email' => $faker->unique()->safeEmail, 
        'phone' => $faker->phoneNumber, 
        'address' => $faker->address, 
        'desc' => $faker->address,
        'created_by'=> 1
    ];
});

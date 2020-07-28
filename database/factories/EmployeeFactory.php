<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Employee;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone'=>$faker->phoneNumber,
        'company_id'=>$faker->randomDigitNot(0),
        'user_id'=>$faker->randomDigitNot(0)
    ];
});

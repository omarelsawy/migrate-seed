<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Patient::class, function (Faker $faker) {
    return [
       'first_name' => $faker->firstName,
        'last_name' => $faker->lastName
    ];
});


$factory->define(App\Account::class, function (Faker $faker) {

    $firstLetter = $faker->randomLetter;
    $numberSetOne = $faker->numberBetween($min = 10 , $max = 99);
    $numberSetTwo = $faker->numberBetween($min = 10 , $max = 99);
    $diagnosisCode = strtoupper($firstLetter) . $numberSetOne . '.' . $numberSetTwo;

    return [
        'diagnosis_code' => $diagnosisCode,
        'patient_id' => $faker->numberBetween($min = 1 , $max = 50)
    ];
});



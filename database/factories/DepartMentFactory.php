<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Department;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Department::class, function (Faker $faker) {
    return [
        'departmentName' => $faker->name,
        'desc' => $faker->sentence
    ];
});

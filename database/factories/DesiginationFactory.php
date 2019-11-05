<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Desigination;
use Faker\Generator as Faker;

$factory->define(Desigination::class, function (Faker $faker) {
    return [
        'desiginationName'=> $faker->name,
        'desiginationOrder' => '123',
        'desc' => $faker->sentence
    ];
});

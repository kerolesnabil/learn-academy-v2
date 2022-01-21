<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tesimonial;
use Faker\Generator as Faker;

$factory->define(Tesimonial::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'spec'=>$faker->text,
        'desc'=>$faker->text,
        'img'=>$faker->randomNumber(5)
    ];
});

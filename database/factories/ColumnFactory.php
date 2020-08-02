<?php

/** @var Factory $factory */

use App\Column;
use App\Model;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Column::class, function (Faker $faker) {
    return [
        'type' => $faker->word,
        'title' => $faker->word,
    ];
});

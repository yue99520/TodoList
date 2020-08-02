<?php

/** @var Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

$factory->define(Model::class, function (Faker $faker) {
    $type = collect(['boolean', 'text', 'time', 'number'])->random(1);
    $content = collect([
        'boolean' => $faker->boolean,
        'text' => $faker->text,
        'time' => Carbon::now(),
        'number' => $faker->randomNumber(),
    ])->get($type);

    $column['type'] = $type;
    $column[$type] = $content;

    return $column;
});

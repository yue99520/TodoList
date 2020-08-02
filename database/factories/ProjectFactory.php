<?php

/** @var Factory $factory */

use App\Project;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Carbon;

$factory->define(Project::class, function (Faker $faker) {
    $now = Carbon::now();
    return [
        'title' => $faker->title,
        'description' => $faker->text,
        'default' => false,
        'user_id' => factory(User::class)->create()->id,
        'created_at' => $now,
        'updated_at' => $now,
    ];
});

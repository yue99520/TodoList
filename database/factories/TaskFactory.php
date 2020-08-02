<?php

/** @var Factory $factory */

use App\Project;
use App\Task;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Carbon;

$factory->define(Task::class, function (Faker $faker) {
    $now = Carbon::now();
    return [
        'title' => $faker->title,
        'description' => $faker->text,
//        'project_id' => factory(Project::class)->create()->id,
        'created_at' => $now,
        'updated_at' => $now,
    ];
});

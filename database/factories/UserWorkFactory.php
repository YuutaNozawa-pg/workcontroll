<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserWork;
use Faker\Generator as Faker;

$factory->define(UserWork::class, function (Faker $faker) {
    return [
        //
        'user_id' => 1,
        'work_time' => $faker->datetime('2017-01-01 00:00:00'),
        'start_time' => $faker->datetime('2017-01-01 00:00:00'),
        'end_time' => $faker->datetime('2017-01-01 00:00:00'),
        'over_time' => $faker->datetime('2017-01-01 00:00:00'),
        'break_time' => $faker->datetime('2017-01-01 00:00:00'),
    ];
});

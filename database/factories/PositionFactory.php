<?php

use Faker\Generator as Faker;
use App\Models\Position;

$factory->define(Position::class, function (Faker $faker) {
    return [
        'name'=>$faker->unique()->lexify(str_repeat('?', rand(2, 5))),
    ];
});

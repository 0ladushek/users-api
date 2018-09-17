<?php

use Faker\Generator as Faker;
use App\Entities\Group;

$factory->define(Group::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

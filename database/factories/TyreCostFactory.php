<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator;
use Ramsey\Uuid\Uuid;
use App\Models\Tyre_cost;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Tyre_cost::class, function (Generator $faker) {
    return [
        'tyre_cost' => $faker->tyre_cost,
        'active' => true,
        'confirmed' => true,
    ];
});

$factory->state(Tyre_cost::class, 'active', function () {
    return [
        'active' => true,
    ];
});

$factory->state(Tyre_cost::class, 'inactive', function () {
    return [
        'active' => false,
    ];
});

$factory->state(Tyre_cost::class, 'confirmed', function () {
    return [
        'confirmed' => true,
    ];
});

$factory->state(Tyre_cost::class, 'unconfirmed', function () {
    return [
        'confirmed' => false,
    ];
});

$factory->state(Tyre_cost::class, 'softDeleted', function () {
    return [
        'deleted_at' => now(),
    ];
});

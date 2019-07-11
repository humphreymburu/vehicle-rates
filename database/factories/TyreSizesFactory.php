<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator;
use Ramsey\Uuid\Uuid;
use App\Models\Vehicle\Tyre_sizes;
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

$factory->define(Tyre_sizes::class, function (Generator $faker) {
    return [
        'tyre_type' => $faker->tyre_type,
        'km_tyre' => $faker->km_tyre,
        'tyre_no' => $faker->tyre_no,
        'active' => true,
        'confirmed' => true,
    ];
});

$factory->state(Tyre_sizes::class, 'active', function () {
    return [
        'active' => true,
    ];
});

$factory->state(Tyre_sizes::class, 'inactive', function () {
    return [
        'active' => false,
    ];
});

$factory->state(Tyre_sizes::class, 'confirmed', function () {
    return [
        'confirmed' => true,
    ];
});

$factory->state(Tyre_sizes::class, 'unconfirmed', function () {
    return [
        'confirmed' => false,
    ];
});

$factory->state(Tyre_sizes::class, 'softDeleted', function () {
    return [
        'deleted_at' => now(),
    ];
});

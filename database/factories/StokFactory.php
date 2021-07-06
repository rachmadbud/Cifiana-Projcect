<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Stok;
use Faker\Generator as Faker;

$factory->define(Stok::class, function (Faker $faker) {
    return [
        'id_barang' => rand(1, 23),
        'stok' => rand(1, 50),
    ];
});

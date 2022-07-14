<?php

namespace Database\Factories;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
$factory->define(Pegawai::class, function (Faker $faker) {
    return [
        'divisi' => $faker -> divisi,
        'nama_pegawai' => $faker->name,
        'nohp' => $faker->nohp,
        'email' => $faker->unique()->safeEmail,
        'alamat' => $faker->secondaryAddress,
        

    ];
});

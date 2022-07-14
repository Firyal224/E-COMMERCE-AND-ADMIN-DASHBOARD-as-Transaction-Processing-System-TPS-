<?php

namespace Database\Factories;

use App\Models\surat;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
$factory->define(surat::class, function (Faker $faker) {
    return [
        'jenis_surat' => $faker -> jenis_surat,
        'nama_pegawai' => $faker->name,
        'isi' => $faker->isi,
        'email' => $faker->unique()->safeEmail,
        'alamat' => $faker->secondaryAddress,
        

    ];
});

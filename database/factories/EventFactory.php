<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

$factory->define(Event::class, function (Faker $faker) {
    $name = $faker->name;
    $slug = Str::slug($name);
    return [
        'user_id' => 1,
        'nama_events' => $name,
        'slug' => $slug,
        'lokasi' => $faker->state,
        'deskripsi' => 'balapan asik',
        'tipe' => 'scs',

        'tanggal_mulai' => now(),
        'tanggal_selesai' => now(),

    ];
});

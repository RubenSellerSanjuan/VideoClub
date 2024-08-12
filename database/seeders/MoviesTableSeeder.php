<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach(range(1, 10) as $index){
            DB::table('movies')->insert([
                'title' => $faker->sentence(3),
                'image' => 'https://www.lahiguera.net/cinemania/pelicula/6281/corazones_de_acero-cartel-5795.jpg',
                'description' => $faker->paragraph,
                'release_year' => $faker->year,
                'duration' => $faker->numberBetween(80,180),
                'price' => $faker->randomFloat(2, 6, 12),
                'rent_price' => $faker->randomFloat(2, 3, 8),
                'quantity' => $faker->numberBetween(1,5),
                'type' => 'movie',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

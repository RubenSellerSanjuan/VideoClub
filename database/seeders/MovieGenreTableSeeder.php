<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieGenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movieIds = DB::table('movies')->pluck('id')->toArray();
        $genreIds = DB::table('genres')->pluck('id')->toArray();

        foreach($movieIds as $movieId){
            $randomGenres = (array) array_rand(array_flip($genreIds), rand(1, 3));

            foreach($randomGenres as $genreId){
                DB::table('movie_genre')->insert([
                    'movie_id' => $movieId,
                    'genre_id' => $genreId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SeriesGenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serieIds = DB::table('series')->pluck('id')->toArray();
        $genreIds = DB::table('genres')->pluck('id')->toArray();

        foreach($serieIds as $serieId){
            $randomGenres = (array) array_rand(array_flip($genreIds), rand(1, 3));

            foreach($randomGenres as $genreId){
                DB::table('series_genre')->insert([
                    'series_id' => $serieId,
                    'genre_id' => $genreId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}

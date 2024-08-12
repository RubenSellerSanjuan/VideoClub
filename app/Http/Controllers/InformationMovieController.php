<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Movie;

class InformationMovieController extends Controller
{
    public function show($id){
        $movie = Movie::with('genres')->find($id);

        return view('informationMovie', ['movie' => $movie]);
    }
}

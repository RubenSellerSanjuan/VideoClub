<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Serie;

class InformationSerieController extends Controller
{
    public function show($id){
        $serie = Serie::with('genres')->find($id);

        return view('informationSerie', ['serie' => $serie]);
    }
}

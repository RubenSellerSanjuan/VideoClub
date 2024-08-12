<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Movie;
use App\Models\Serie;
use Illuminate\Http\Request;

class ProductionsController extends Controller
{
    public function index(Request $request){
        $query = $request->input('query');
        $user = Auth::user();

        $movies = Movie::when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('title', 'like', "%{$query}%")
                         ->orWhere('release_year', $query);
        })->get();

        $series = Serie::when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('title', 'like', "%{$query}%")
                         ->orWhere('release_year', $query);
        })->get();

        return view('index', compact('movies', 'series', 'user'));
    }
}

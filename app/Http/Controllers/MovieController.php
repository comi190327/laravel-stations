<?php
namespace App\Http\Controllers;
use App\Models\Movie;

class MovieController extends Controller
{
    public function getMovie()
    {
        // $movie->timestamps = false;
        $movies = Movie::all();
        // return response()->json($movie);
        return view('getMovie', ['movies' => $movies]);
    }
    public function movies()
    {
        $movies = Movie::all();
        return view('movies', ['movies' => $movies]);
    }
}
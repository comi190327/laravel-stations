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
    // 映画一覧表示
    public function movies()
    {
        $movies = Movie::all();
        return view('movies', ['movies' => $movies]);
    }
    // 映画新規登録画面
    public function createMovies()
    {
        return view('createMovies');
    }
    // 映画新規登録送信先
    public function storeMovies(Request $request)
    {
        $data = $request->all();
        return view('storeMovies')->with($data);
    }
}
<?php
namespace App\Http\Controllers;
use App\Models\Movie;
use Illuminate\Http\Request;
use App\Models\Post;

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
        try
        {
            $post = new Post();
            $post->title = $request->title;
            $post->image_url = $request->image_url;
            $post->published_year = $request->published_year;
            $post->is_showing = $request->is_showing;
            $post->description = $request->description;
            $post->save();
        } catch (\exeption $e)
        {
            report($e);
            session()->flash('flash_messsage', 'エラーが発生しました。再度入力してください。');
            return redirect('create');
        }
        

        return view('storeMovies', ['request' => $request]);
    }
}
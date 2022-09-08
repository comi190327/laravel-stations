<?php
namespace App\Http\Controllers;
use App\Models\Movie;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\support\Facedes\DB;
use Exception;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        // 全件取得
        // $movies = Movie::all();
        // 検索フォームに入力された値を取得
        $keyword = $request->input('keyword');
        $status = $request->input('is_showing');
        // var_dump($keyword);
        // var_dump($status);
        // クエリビルダ
        // $query = Movie::query();
        $query = Movie::titleEqual($request->input);
        if(!is_null($status)) {
            if($status == '2' && !empty($keyword)) {
                $query->where('title','like', '%'.$keyword.'%')->orWhere('description','like', '%'.$keyword.'%');
            } elseif($status <> '2' && !empty($keyword)) {
                $query->where('is_showing', $status)
                ->where(function($query) use($keyword) {
                    $query->where('title','like', '%'.$keyword.'%')
                    ->orWhere('description','like', '%'.$keyword.'%');
                });
            } elseif ($status <> '2' && empty($keyword)) {
                $query->where('is_showing', $status);
            }
            // var_dump($query->toSql(), $query->getBindings());
            $movies = $query->get();
        } else {
            $movies = Movie::all();
            $keyword = '';
            $status = '2';
        }
        return view('index', ['movies' => $movies, 'keyword' => $keyword, 'is_showing' => $status]);
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
    public function storeMovies(PostRequest $request)
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
                return response()->view('storeMovies', ['request' => $request], 302);
            } catch (QueryException $e) {
                session()->flash('fhashmessage','エラーが発生しました。');
                return redirect('create');
            }
            

    }
    // 映画編集画面遷移
    public function edit($id)
    {
        $movie = Movie::find($id);
        return view('edit', ['movie' => $movie]);
        // echo ($id);
        // $param = ['id' => $request->id];
        // $item = DB::select('select * from movies where id = :id', $id);
        // echo ($item);
        // return view('{$id}/edit', ['form => $item[0]']);
    }
    // 映画更新画面
    public function update(PostRequest $request)
    {
        try
        {
            $movie = Movie::find($request->id);
            $movie->title = $request->title;
            $movie->image_url = $request->image_url;
            $movie->published_year = $request->published_year;
            $movie->is_showing = $request->is_showing;
            $movie->description = $request->description;
            $movie->save();
            // DB::update('update movies set title = :title, image_url = :image_url, published_year = :published_year, is_showing = :is_showing, description = :description where id = :id, $param');
            return response()->view('update', ['request' => $request], 302);
        } catch (QueryException $e) {
            session()->flash('fhashmessage','エラーが発生しました。');
            return redirect('edit', ['request' => $request]);
        }
        
    }
    // 映画削除
    public function destroy($id)
    {
        
        // 削除
        // 削除対象レコードを検索
            $movie = Movie::find($id);
            if (is_null($movie)) {
                abort(404);
            }
            $movie->delete();
            // flashメッセージを表示しながらリダイレクト
            session()->flash('flashmessage', '映画の削除が完了しました。');
            return redirect('/admin/movies');
    }
    public function show($id)
    {
        $movie = Movie::find($id);
        return view('show', ['movie' => $movie]);
    }
}
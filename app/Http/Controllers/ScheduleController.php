<?php
namespace App\Http\Controllers;
use App\Models\Schedule;
use App\Models\Movie;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\support\Facedes\DB;
use Exception;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        // 全件取得
        // $schedules = Schedule::all();
        // return view('schedule', ['schedules' => $schedules]);
        $movies = Movie::all();
        return view('schedule', ['movies' => $movies]);
    }
    public function show($id)
    {
        $movie = Movie::find($id);
        return view('showSchedule', ['movie' => $movie]);
    }
    public function create($id)
    {
        $movie = Movie::find($id);
        return view('createSchedule', ['movie' => $movie]);
    }
    public function store(PostRequest $request)
    {
        try {
            $post = new Post();
            $post->movie_id = $request->movie_id;
            $post->start_time = $request->start_time_time;
            $post->end_time = $request->end_time_time;
            $post->save();
            return response()->view('storeSchedule', ['request' => $request], 302);
        } catch (QueryException $e) {
            session()->flash('fhashmessage','エラーが発生しました。');
            return redirect('createSchedule');
        }
        
    }
    public function edit()
    {

    }
    public function update()
    {

    }
}
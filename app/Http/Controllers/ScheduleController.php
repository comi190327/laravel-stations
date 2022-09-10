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
    public function showMovie($id)
    {
        $movie = Movie::find($id);
        return view('showMovie', ['movie' => $movie]);
    }
    public function showSchedule($id)
    {
        $schedule = Schedule::find($id);
        return view('showSchedule', ['schedule' => $schedule]);
    }
    public function create($id)
    {
        $movie = Movie::find($id);
        return view('createSchedule', ['movie' => $movie]);
    }
    public function store(Request $request)
    {
        try
        {
            $post = new Schedule();
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
    public function edit($id)
    {
        $schedule = Schedule::find($id);
        dump($schedule->start_time);
        dump($schedule->end_time);
        return view('editSchedule', ['schedule' => $schedule]);
    }
    public function update(Request $request)
    {
        try
        {
            $schedule = Schedule::find($request->id);
            $schedule->start_time = $request->start_time_time;
            $schedule->end_time = $request->end_time_time;
            $schedule->save();
            return response()->view('updateSchedule', ['request' => $request], 302);
        } catch (QueryException $e) {
            session()->flash('fhashmessage','エラーが発生しました。');
            return redirect('editSchedule', ['request' => $request]);
        }
    }
    public function destroy($id)
    {
        $schedule = Schedule::find($id);
            if (is_null($schedule)) {
                abort(404);
            }
            $schedule->delete();
            // flashメッセージを表示しながらリダイレクト
            session()->flash('flashmessage', '映画の削除が完了しました。');
            return redirect('/admin/schedules');
    }
}
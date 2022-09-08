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
    public function create()
    {
        
    }
    public function edit()
    {

    }
    public function update()
    {

    }
}
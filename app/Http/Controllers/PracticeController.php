<?php
namespace App\Http\Controllers;
use App\Models\Practice;

class PracticeController extends Controller
{
    public function sample()
    {
        // return response('practice');
        return view('practice');
    }
    public function sample2()
    {
        $test = 'practice2';
        // return response($test);
        return view('practice2', ['testParam' => $test]);
    }
    public function sample3()
    {
        $value = 'test';
        // return response($value);
        return view('practice3', ['testParam' => $value]);
    }
    public function getPractice()
    {
        $practice = Practice::all();
        return response()->json($practice);
    }
}

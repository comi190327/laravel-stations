<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\MovieController;
/*
|-------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*
Route::get('practice', function () {
    return response('practice');
});

Route::get('practice2', function () {
    $test = 'practice2';
    return response($test);
});

Route::get('practice3', function () {
    $value = 'test';
    return response($value);
});
*/
Route::get('/practice', [PracticeController::class, 'sample']);
Route::get('/practice2', [PracticeController::class, 'sample2']);
Route::get('/practice3', [PracticeController::class, 'sample3']);
Route::get('/getPractice', [PracticeController::class, 'getPractice']);
Route::get('/getMovie', [MovieController::class, 'getMovie']);
Route::get('/admin/movies', [MovieController::class, 'movies']); // moviesテーブル一覧を表示
Route::get('/admin/movies/create', [MovieController::class, 'createMovies']); // moviesテーブル新規登録画面
Route::post('/admin/movies/store', [MovieController::class, 'storeMovies']); // moviesテーブル新規登録送信先
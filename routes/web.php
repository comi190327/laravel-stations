<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SheetController;
use App\Http\Controllers\ScheduleController;
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
Route::get('/movies', [MovieController::class, 'index']);
Route::get('/admin/movies', [MovieController::class, 'movies']); // moviesテーブル一覧を表示
Route::post('/admin/movies', [MovieController::class, 'movies']); // moviesテーブル一覧を表示(削除からリダイレクトしたとき用)
Route::get('/admin/movies/create', [MovieController::class, 'createMovies']); // moviesテーブル新規登録画面
Route::post('/admin/movies/store', [MovieController::class, 'storeMovies']); // moviesテーブル新規登録送信先
Route::get('/admin/movies/{id}/edit', [MovieController::class, 'edit'])->name('movie.edit');
Route::patch('/admin/movies/{id}/update', [MovieController::class, 'update']); // moviesテーブル更新処理
Route::put('/admin/movies/{id}/update', [MovieController::class, 'update']); // moviesテーブル更新送信先
Route::get('/admin/movies/{id}/destroy', [MovieController::class, 'destroy']); // movie削除
Route::delete('/admin/movies/{id}/destroy', [MovieController::class, 'destroy']); // movie削除
Route::get('sheets', [SheetController::class, 'index']); // sheets表示
Route::get('/movies/{id}', [MovieController::class, 'show']);
Route::get('/admin/schedules', [ScheduleController::class, 'index']);
Route::get('/admin/schedules/{id}', [ScheduleController::class, 'showSchedule']);
Route::post('/admin/schedules/{id}', [ScheduleController::class, 'showSchedule']);
Route::get('/admin/movies/{id}', [ScheduleController::class, 'showMovie']);
Route::get('/admin/movies/{id}/schedules/create', [ScheduleController::class, 'create']);
Route::get('/admin/movies/{id}/schedules/store', [ScheduleController::class, 'store'])->name('schedule.store');
Route::post('/admin/movies/{id}/schedules/store', [ScheduleController::class, 'store'])->name('schedule.store');
Route::get('/admin/schedules/{scheduleId}/edit', [ScheduleController::class, 'edit']);
Route::patch('/admin/schedules/{scheduleId}/update', [ScheduleController::class, 'update']);
Route::put('/admin/schedules/{scheduleId}/update', [ScheduleController::class, 'update']);
Route::delete('/admin/schedules/{scheduleId}/destroy', [ScheduleController::class, 'destroy']);

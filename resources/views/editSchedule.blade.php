<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>スケジュール編集画面</title>
</head>
<body>
@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
@endif
<div class='schedule_edit_title'>
    <h1>スケジュール編集フォーム</h1>
</div>
<form action='update' method='post' class='schedule_edit'>
@method('patch')
@csrf
<div class='movie_title'>
    <h2>スケジュールID：{{ $schedule->id }}</h2>
    <input type='hidden' name='id' id='id' value='{{ $schedule->id }}'>
</div>
<div class='movie_schedule'>
    <table>
        <tr>
            <td>開始日付：<input type='date' name='start_time_date' id='start_time_date' value="{{ $schedule->start_time->format('Y/m/d') }}"></td>
            <td>開始時間：<input type='time' name='start_time_time' id='start_time_time' value='{{ $schedule->start_time->format("H:i") }}'></td>
        </tr>
        <tr>
            <td>終了日付：<input type='date' name='end_time_date' id='end_time_date' value="{{ $schedule->end_time->format('Y/m/d') }}"></td>
            <td>終了時間：<input type='time' name='end_time_time' id='end_time_time' value='{{ $schedule->end_time->format("H:i") }}'></td>
        </tr>
    </table>
    <input type='submit' value='更新'>
</div>
</form>
</body>
</html>
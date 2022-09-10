<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>スケジュール管理画面</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<script>
@if (session('flashmessage'))
    $(function () {
        toastr.success('{{ session('flashmessage') }}');
    });
@endif
</script>
<body>
    <div class='schedule_list'>
    @foreach($movies as $movie)
        <div class='movie_desc'>
            <div class='movie_title'>
                <h2>作品ID：{{ $movie->id }}　作品名：{{ $movie->title }}</h2>
            </div>
        @foreach($movie->schedules as $schedule)
            <div class='movie_schedule'>
               <a href="/admin/schedules/{{ $schedule->id }}"> スケジュールID：{{ $schedule->id }}　上映開始時刻：{{ $schedule->start_time }}　上映終了時刻：{{ $schedule->end_time }}　作成日時：{{ $schedule->end_time }}　更新日時：{{ $schedule->end_time }}</a>
            </div>
        @endforeach
    @endforeach
    </div>
</body>
</html>
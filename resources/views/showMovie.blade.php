<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>映画詳細画面</title>
</head>
<body>
    <h2>映画詳細</h2>
</body>
    <div class='movie_show'>
        <table>
            <tr><th>映画タイトル</th><td>{{ $movie->title }}</td></tr>
            <tr><th>画像</th><td><img class='movie_img' src='{{ $movie->image_url }}'></td></tr>
            <tr><th>公開年</th><td>{{ $movie->published_year }}</td></tr>
            <tr><th>上映状態</th>
                <td>
                @if($movie->is_showing === 1)
                    上映中
                @else
                    上映予定
                @endif
                </td>
            </tr>
            <tr><th>概要</th><td>{{ $movie->description }}</td></tr>
            <tr><th>映画情報作成日時</th><td>{{ $movie->created_at }}</td></tr>
            <tr><th>映画情報更新日時</th><td>{{ $movie->updated_at }}</td></tr>
            @foreach($movie->schedules as $schedule)
            <tr><th>上映時間ID</th><td><a href='/admin/schedules/{{ $schedule->id }}'>{{ $schedule->id }}</a></td></tr>
            <tr><th>上映開始時刻</th><td>{{ $schedule->start_time->format('H:i') }}</td></tr>
            <tr><th>上映終了時刻</th><td>{{ $schedule->end_time->format('H:i') }}</td></tr>
            <tr><th>上映情報作成日時</th><td>{{ $schedule->created_at }}</td></tr>
            <tr><th>上映情報更新日時</th><td>{{ $schedule->updated_at }}</td></tr>
            @endforeach
        </table>
        <tr><a href='/admin/movies/{{ $movie->id }}/schedules/create'>上映時間作成</a></tr>
    </div>
</html>
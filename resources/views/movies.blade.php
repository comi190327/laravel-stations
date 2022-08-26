<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Movie管理画面</title>
</head>
<body>
    <table>
        <thead>
            <th>ID</th>
            <th>映画タイトル</th>
            <th>画像URL</th>
            <th>公開年</th>
            <th>上映中かどうか</th>
            <th>概要</th>
            <th>登録日時</th>
            <th>更新日時</th>
        </thead>
        @foreach ($movies as $movie)
        <tbody>
            <td>{{ $movie->id }}</td>
            <td>{{ $movie->title }}</td>
            <td>{{ $movie->image_url }}</td>
            <td>{{ $movie->published_year }}</td>
            @if($movie->is_showing === 1)
            <td>上映中</td>
            @else
            <td>上映予定</td>
            @endif
            <td>{{ $movie->description }}</td>
            <td>{{ $movie->created_at }}</td>
            <td>{{ $movie->updated_at }}</td>
        </tbody>
        @endforeach
    </table>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Movie</title>
</head>
<body>
<div class='movie_search_form'>
<h2>映画検索フォーム</h2>
    <form action='movies' method='get'>
    @csrf
    <table>
        <tr><th>検索キーワード</th><td><input type='text' id='keyword' name='keyword' value="{{ old('keyword', $keyword) }}"></td></tr>
        <tr>
            <th>上映状態</th>
            <td>
                <label><input type='radio' name='is_showing' value='2' {{ old('is_showing', $is_showing) == '2' ? 'checked' : '' }} />すべて</label>
                <label><input type='radio' name='is_showing' value='0' {{ old('is_showing', $is_showing) == '0' ? 'checked' : '' }}/>公開予定</label>
                <label><input type='radio' name='is_showing' value='1' {{ old('is_showing', $is_showing) == '1' ? 'checked' : '' }}/>公開中</label>
            </td>
        </tr>   
    </table>
    <input type='submit' value='検索'>
    </form>
</div>
<div class='movies'>
<h2>映画一覧</h2>
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
            @if($movie->is_showing == 1)
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
</div>
</body>
</html>
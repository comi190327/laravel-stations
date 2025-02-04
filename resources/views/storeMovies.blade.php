<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Movie新規登録完了</title>
</head>
<body>
以下のデータを正常に登録しました。
<table>
    <tr>
        <th><label for='title'>映画タイトル：</label></th>
        <td>{{ $request->title }}</td>
    </tr>
    <tr>
        <th><label for='image_url'>画像URL：</label></th>
        <td>{{ $request->image_url }}</td>
    </tr>

    <tr>
        <th><label for='published_year'>公開年：</label></th>
        <td>{{ $request->published_year }}</td>
    </tr>
    <tr>
        <th><label for='is_showing'>公開中かどうか ：</label></th>
        <td>{{ $request->is_showing }}</td>
    </tr>
    <tr>
        <th><label for='description'> 概要：</label></th>
        <td>{{ $request->description }}</td>
    </tr>
    </table>
</body>
</html>

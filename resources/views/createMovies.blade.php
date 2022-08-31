<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Movie新規登録</title>
</head>
<body>
@if(Session::has('flashmessage'))
    <!-- モーダルウィンドウの中身 -->
    <div class="modal fade" id="myModal" tabindex="-1"
         role="dialog" aria-labelledby="label1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    {{ session('flash_message') }}
                </div>
                <div class="modal-footer text-center">
                </div>
            </div>
        </div>
    </div>
@endif
<form action='store' method='post' class='movie_create_form'>
@csrf
    <table>
    <div class='movie_create_form'>
        <tr>
            <th><label for='title'>映画タイトル：</label></th>
            <td><input type='text' name='title' id='title' required></td>
        </tr>
    </div>
    <div class='movie_create_form'>
        <tr>
            <th><label for='image_url'>画像URL：</label></th>
            <td><input type='url' name='image_url' id='image_url' required></td>
        </tr>
    </div>
    <div class='movie_create_form'>
        <tr>
        <th><label for='published_year'>公開年：</label></th>
        <td><input type='number' max=9999 name='published_year' id='published_year' required></td>
        </tr>
    </div>
    <div class='movie_create_form'>
        <tr>
        <th><label for='is_showing'>公開中かどうか ：</label></th>
        <td><input type='checkbox' name='is_showing' id='is_showing' value=1 required></td>
        </tr>
    </div>
    <div class='movie_create_form'>
        <tr>
        <th><label for='description'> 概要：</label></th>
        <td><textarea name='description' id='description' rows='5' cols='35'></textarea></td>
        </tr>
    </div>
    </table>
    <div class='movie_create_form'>
        <input type='submit' value='登録'>
    </div>
</form>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>映画レビュー</title>
</head>
<body>
    <div id="cinema_detail">
        <div id="cinema_visual">
            <a href="{{ route('review.detail',$cinema['id']) }}"><img src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{ $cinema['poster_path'] }}" alt="ポスターパス"> </a>
            <br>
            <a href="{{ route('review.create',$cinema['id']) }} "><button type="submit">見た</button></a>
            <button type="submit">見たい</button>
        </div>
        <div id="cinema_infomation">
            <ul>
                <li>{{ $cinema['title'] }}</li>
                <li>{{ $cinema['release_date'] }}</li>
                @foreach($cinema['genres'] as $cinema_genre)
                    <li>{{ $cinema_genre['name'] }}</li>
                @endforeach
                <li>{{ $cinema['overview'] }}</li>
                <li>{{ $cinema['popularity'] }}</li>
            </ul>
        </div>
    </div>
    <div id="cinema_review">
        <h2>ユーザーコメント</h2>
        @foreach($review_comments as $review_comment)
            <div>
                <table>
                    <tr>
                        <th>ユーザーID:</th>
                        <td>{{ $review_comment->user->user_name}}</td>
                    </tr>
                    <tr>
                        <th>レビュー日:</th>
                        <td>{{ $review_comment->created_at }}</td>
                    </tr>
                    <tr>
                        <th>評価:</th>
                        <td>{{ $review_comment->point }}点</td>
                    </tr>
                    <tr>
                        <th>レビュー内容:</th>
                        <td>{{ $review_comment->review_comment }}</td>
                    </tr>
                </table>
                </ul>
            </div>
        @endforeach
    </div>
    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>映画レビュー</title>
</head>
<body>
    <div id="cinema_detail">
        <div id="cinema_visual">
            <a href="{{ route('review.detail',$cinema['id']) }}"><img id="visual" src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{ $cinema['poster_path'] }}" alt="ポスターパス"> </a>
            <br>
            <a href="{{ route('review.create',$cinema['id']) }} "><button type="submit">見た</button></a>
            <button type="submit">見たい</button>
        </div>
        <div id="cinema_infomation">
            <table id="cinema_info_table">
                <tr>
                    <th>タイトル:</th>
                    <td>{{ $cinema['title'] }}</td>
                </tr>
                <tr>
                    <th>ジャンル:</th>
                    <td>
                    @foreach($cinema['genres'] as $cinema_genre)
                        {{ $cinema_genre['name'] }}
                    @endforeach
                    </td>
                </tr>
                <tr>
                    <th>あらすじ:</th>
                    <td>{{ $cinema['overview'] }}</td>
                </tr>
                <tr>
                    <th>評価:</th>
                    <td>{{ $cinema['popularity'] }}点</td>
                </tr>
            </table>
        </div>
    </div>
    <div id="cinema_review">
    <h2>フレンドユーザーコメント</h2>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
        </div>
    </div>
    @foreach($review_comments as $review_comment)    
        <div>
            <table>
                <tr>
                    <th>ユーザーID:</th>
                    <td><a href="https://www.sejuku.net/">{{ $review_comment->user->user_name}}</a></td>
                        
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
            <br>
        </div>
    @endforeach
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html> 
@extends('layouts.app')
@section('title','レビュー詳細')
@section('content')
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
        @foreach($review_comments as $review_comment)    
            <div id="friend_review_card" class="card" style="width: 80%;">
                <div class="card-body">
                    <table class="card-text">
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
                </div>
            </div>
        @endforeach
        <h2>フレンド外ユーザーコメント</h2>
        <div id="user_review_card">
            <p>これはフレンド外のレビューです。</p>
        </div>
    </div>
@endsection
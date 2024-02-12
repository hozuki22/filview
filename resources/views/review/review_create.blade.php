@extends('layouts.app')
@section('title','レビューコメント')
@section('content')
    <h1 id=review_create_title>{{ $cinema['title'] }}のレビュー</h1>
    <div id="review_form">
        <form action="{{ route('review.post') }}" method="POST">
            @csrf
            <div id="review_point" class=>
            <label for="point">レビュー点数:</label>
            <select name="point" id="point" class="form-select" aria-label="Default select example">
                @for($i=1; $i<=10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>                
                @endfor
            </select>
            <br>
            </div>
            <label for="review_comment">レビュー:</label>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="review_comment"></textarea>
                <label for="floatingTextarea2">レビュー内容を記載してください。</label>
                <input type="hidden" name="cinema_code" value="{{ $cinema['id']}} ">
            </div>
            <button id="review_submit_button" type="submit">登録する</button>
        </form>
    </div>
@endsection
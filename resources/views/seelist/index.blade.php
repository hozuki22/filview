@extends('layouts.app')
@section('title','見たいリスト')
@section('content')
    <h1>見たいリスト</h1>
    <div>
        @foreach($cinemas as $cinema)
            <div>
                <ul>
                    <li><img src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{ $cinema['poster_path'] }}" alt="ポスターパス"></li>
                    <li>{{ $cinema['title'] }}</li>
                    <br>
                    <a href="{{ route('review.create',$cinema['id']) }} "><button type="submit">見た</button></a>
                    <a href="{{ route('wanttosee.store',$cinema['id']) }}"><button type="submit">見たい</button></a>
                </ul>
            </div>
        @endforeach
    </div>

@endsection

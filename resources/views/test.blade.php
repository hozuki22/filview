<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APIテスト</title>
</head>
<body>
    @if (session('flash_message'))
        <p>{{ session('flash_message') }}</p>
    @endif
    <div>
        <ul>
        @foreach($films['results'] as $film)
            <li>{{ $film['title'] }}</li>
            <img src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{ $film['poster_path'] }}" alt="ポスターパス"> 
            <form action="{{ route('review.create',$film['id']) }}" method="POST">
                @csrf
                <input type="hidden" name="cinema_code" value="{{ $film['id'] }}">
                <input type="hidden" name="title" value="{{ $film['title'] }}">
                <button type="submit">見た</button>
            </form>
            <form action="" method="POST">
                @csrf
                <input type="hidden" name="cinema_code", value="{{ $film['id'] }}">
                <button type="submit">見たい</button>
            </form>
            <br>
       @endforeach
       </ul>
    </div>
</body>
</html>
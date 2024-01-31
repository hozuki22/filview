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
        @foreach($cinemas['results'] as $cinema)
            <li>{{ $cinema['title'] }}</li>
            <a href="{{ route('review.detail',$cinema['id']) }}"><img src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{ $cinema['poster_path'] }}" alt="ポスターパス"> </a>
            <a href="{{ route('review.create',$cinema['id']) }} "><button type="submit">見た</button></a>
            <button type="submit">見たい</button>
            </form>
            <br>
       @endforeach
       </ul>
    </div>
</body>
</html>
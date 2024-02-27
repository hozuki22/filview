<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>検索結果</title>
</head>
<body>
    <h1>検索結果</h1>
    <div>
        <ul>
        @foreach($cinemas['results'] as $cinema)
            {{ dd($cinema['title']) }}
            <li>{{ $cinema['title'] }}</li>
            <a href="{{ route('review.detail',$cinema['id']) }}"><img src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{ $cinema['poster_path'] }}" alt="ポスターパス"> </a>
            <br>
            <a href="{{ route('review.create',$cinema['id']) }} "><button type="submit">見た</button></a>
            <a href="{{ route('wanttosee.store',$cinema['id']) }}"><button type="submit">見たい</button></a>
            </form>
            <br>
       @endforeach
       </ul>
    </div>
    
</body>
</html>
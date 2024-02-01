<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>レビューコメント</title>
</head>
<body>
    <p>{{ $cinema['title'] }}のレビュー</p>

    <form action="{{ route('review.post') }}" method="POST">
        @csrf
        <div> 
            <label for="point">レビュー点数:</label>
            <select name="point" id="point">
                @for($i=1; $i<=10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>                
                @endfor
            </select>
            <br>
            <label for="review_comment">レビュー:</label>
            <textarea name="review_comment" id="review_comment" cols="30" rows="10"placeholder="レビュー内容を入力してください。"></textarea>
            <br>
            <input type="hidden" name="cinema_code" value="{{ $cinema['id']}} ">
            <button type="submit">登録する</button>
        </div>
    </form>
</body>
</html>
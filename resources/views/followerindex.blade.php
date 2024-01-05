<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フォロワーユーザー一覧</title>
</head>
<body>
    <h1>フォロワーユーザー一覧</h1>
    @if($followerusers->isNotEmpty())
        @foreach($followerusers as $followeruser)
            <div>
                <ul>
                    <li>{{ $followeruser->follower_id }}</li>
                    <a href="">フォローする</a>
                </ul>
            </div>
        @endforeach
        @else
        <p>フォロワーユーザーはいません。</p>
    @endif    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フォロワーユーザー一覧</title>
</head>
<body>
    <h1>フォロワーユーザー一覧</h1>
    @if(!empty($follower))
        @foreach($follower as $follower_user)
            <div>
                <ul>
                    @if(!(in_array($follower_user,$follow)))
                    <form action="{{ route('follower.follow',$follower_user) }}" method="POST">
                        @csrf
                        <li>{{ $follower_user }}</li>
                        <button type="submit">フォローする</button>
                    </form>
                    @else
                    <li>{{ $follower_user }}</li>
                    <button disabled>フォロー中</button>
                    @endif
                </ul>
            </div>
        @endforeach
        @else
        <p>フォロワーユーザーはいません。</p>
    @endif    
</body>
</html>
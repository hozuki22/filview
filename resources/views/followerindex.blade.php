<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フォロワーユーザー一覧</title>
</head>
<body>
    <h1>フォロワーユーザー一覧</h1>
    @if(!empty($loginuser_followers))
        @foreach($loginuser_followers as $loginuser_follower)
            <div>
                <ul>
                    @if(in_array($loginuser_follow_name,$loginuser_followers))
                    <form action="{{ route('follower.follow',$loginuser_follower) }}" method="POST">
                        @csrf
                        <li>{{ $loginuser_follower }}</li>
                        <button type="submit">フォローする</button>
                    </form>
                    @else
                    <li>{{ $loginuser_follower }}</li>
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
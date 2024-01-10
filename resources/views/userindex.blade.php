<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー一覧</title>
</head>
<body>
    <h1>ユーザー一覧</h1>
    @if (session('flash_message'))
        <p>{{ session('flash_message') }}</p>
    @endif
    @if($users->isNotEmpty())
        @foreach($users as $user)
        <div id='usercard'>
            <ul>    
                <li>{{ $user->user_id }}</li>
                @foreach($followusers as $followuser)
                    @if($followusers !== $loginuser->user_id && $followusers !== $user->user_id)
                        <form action="{{ route('user.follow') }}" method="POST">
                            @csrf
                                <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                                <button type="submit">フォローする</button>
                        </form>
                    @elseif( $followuser->follower_id == $loginuser->user_id && $user->user_id == $followuser->followed_id )
                        <form action="{{ route('follow.delete',$followuser) }}" method="POST">
                            @csrf
                            <button type="submit">フォロー解除</button>
                        </form>
                    @elseif($user->user_id !== $followuser->followed_id )
                        @continue
                    @endif  
                @endforeach 
            </ul>
        </div>
        @endforeach
    @endif
</body>
</html>
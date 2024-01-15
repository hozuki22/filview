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
                <li>{{ $user->user_name }}</li>
                @if(!(in_array($user->id,$array2)))
                <form action="{{ route('user.follow') }}" method="POST">
                            @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <button type="submit">フォローする</button>
                </form>
                @else
                <form action="{{ route('userindex.followdelete',$user->id) }}" method="POST">
                    @csrf
                    <button type="submit">フォロー解除</button>
                </form>
                @endif
            </ul>
        </div>
        @endforeach
    @endif
</body>
</html>
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
            <form action="{{ route('user.follow') }}" method="POST">
            @csrf
              <ul>
                    <li>{{ $user->user_id }}</li>
                    <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                    <button type="submit">フォローする</button>
                </ul>
            </form>
        </div>
        @endforeach
    @endif
</body>
</html>
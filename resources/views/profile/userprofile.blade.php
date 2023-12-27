<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザープロファイル編集</title>
</head>
<body>
    <form action="{{ route('userprofile.update',$user)}}" method="POST">
        @csrf
        @if (session('flash_message'))
            <p>{{ session('flash_message') }}</p>
        @endif
        <!-- ユーザーID -->
        <div> 
            <label for="user_id">ユーザーID:</label>
            <input type="text" id="user_id" name="user_id" value="{{ $user->user_id }}">
        </div>

        <!-- メールアドレス -->
        <div>
            <label for="email">メールアドレス：</label>
            <input type="text" id="email" name="email" value="{{ $user->email }}">
        </div>

        <!-- 生年月日 -->
        <div>
            <label for="birthday">生年月日:</label>
            <input type="birthday" id="birthday" name=birthday value="{{ $user->birthday }}">
        </div>

        <!-- パスワード -->
        <div>
            <label for="password">パスワード:</label>
            <input type="text" id="password" name="password">
        </div>

        <!-- パスワード（確認用) -->
        <div>
            <label for="password_confirm">パスワード（確認用）:</label>
            <input type="text" id="password_confirm" name='password_confirm'>
        </div>

        <button type="submit">更新</button>
    </form>
</body>
</html>
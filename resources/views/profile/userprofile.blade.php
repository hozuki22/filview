<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザープロファイル編集</title>
</head>
<body>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>   
        </div>
    @endif
    <form action="{{ route('userprofile.update',$user)}}" method="POST">
        @csrf
        @if (session('flash_message'))
            <p>{{ session('flash_message') }}</p>
        @endif
        <!-- ユーザーID -->
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div> 
            <label for="user_name">ユーザーID:</label>
            <input type="text" id="user_name" name="user_name" value="{{ $user->user_name }}">
        </div>

        <!-- メールアドレス -->
        <div>
            <label for="email">メールアドレス：</label>
            <input type="text" id="email" name="email" value="{{ $user->email }}">
        </div>

        <!-- 生年月日 -->
        <div>
            <label for="birthday">生年月日:</label>
            <select name="year">
                <option value="{{ $year }}" selected>{{ $year }}</option>
                @for($i = 1930; $i < $currentyear; $i++)
                    <option value={{ $i }}>{{ $i }}</option>
                @endfor
            </select>
            <select name="month">
                <option value="{{ $month }}" selected>{{ $month }}</option>
                @for($i = 1; $i < 13; $i++)
                    <option value = {{ $i }}>{{ $i }}</option>
                @endfor
            </select>
            <select name="day" id="day">
                <option value="{{ $day }}" selected>{{ $day }}</option>
                @for($i = 1; $i < 32; $i++)
                 <option value={{ $i }}>{{ $i }}</option>
                @endfor
            </select>
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
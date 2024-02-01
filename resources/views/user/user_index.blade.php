<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー一覧</title>
</head>
<body>
    <h1 class="text-center">ユーザー一覧</h1>
    @if (session('flash_message'))
        <p>{{ session('flash_message') }}</p>
    @endif
    @if($users->isNotEmpty())
        @foreach($users as $user)
        <div id='usercard' class="text-warning-emphasis">
            <ul>    
                <li>{{ $user->user_name }}</li>
                @if(!(in_array($user->id,$followed_user)))
                <form action="{{ route('user.followfunction') }}" method="POST">
                    @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <button type="submit">フォローする</button>
                </form>
                @else
                <form action="{{ route('user.followdeletefuncion',$user->id) }}" method="POST">
                    @csrf
                    <button type="submit">フォロー解除</button>
                </form>
                @endif
            </ul>
        </div>
        @endforeach
    @endif
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フォローユーザー一覧</title>
</head>
<body>
    <h1>フォローユーザー一覧</h1>
    
            <div>
                <ul> 
                    @if(!empty($followed_users))
                        @foreach($followed_users as $follow_user )
                            <form action="{{ route('follow.deletefunciton',$follow_user) }}" method="POST">
                                    <li>{{ $follow_user }}</li> 
                                    @csrf
                                    <input type="hidden", name="id", value="{{ $follow_user }}">
                                    <button type="submit">フォロー解除</button>
                            </form>
                         @endforeach
                    @else
                        <p>現在、フォローしているユーザーはいません。</p>
                    @endif    
                </ul>
            </div>
</body>
</html>
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
                    @if($followusers->isNotEmpty())
                        @foreach($followusers as $followuser)
                            <form action="{{ route('follow.delete',$followuser) }}" method="POST">
                                <li>{{ $followuser->followed_id }}</li> 
                                @csrf
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
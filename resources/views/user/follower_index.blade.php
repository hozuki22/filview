@extends('layouts.app')
@section('title','フォロワーユーザー一覧')
@section('content')
    @include('layouts.mypageheader')
    <h1 id="follower_title">フォロワーユーザー一覧</h1>
    @if(!empty($loginuser_followers))
        @foreach($loginuser_followers as $loginuser_follower)
            <div id="follower_content">
                <table id="follower_list" class="table table-bordered border-black">
                    <tr>
                        <td>ユーザー名：</td>
                        <td>{{ $loginuser_follower }}</td>
                    </tr>
                    <tr>
                        <td>フォロー数：</td>
                        <td>数字</td>
                    </tr>
                    <tr>
                        <td>フォロワー数：</td>
                        <td>数字</td>
                    </tr>
                </table>
                @if(in_array($loginuser_follow_name,$loginuser_followers))
                    <form action="{{ route('follower.index',$loginuser_follower) }}" method="POST">
                        @csrf
                        <div id="follower_button">
                            <button type="submit">フォローする</button>
                        </div>
                    </form>
                @else
                    <div id="follower_button">
                        <button disabled>フォロー中</button>
                    </div>
                @endif
            </div>
        @endforeach
        @else
        <p>フォロワーユーザーはいません。</p>
    @endif    
@endsection
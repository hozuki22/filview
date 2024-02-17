@extends('layouts.app')
@section('title','フォローユーザー一覧')
@section('content')
    <h1 id="myfollow_user_title">フォローユーザー一覧</h1>
    <div id="follow_user_list">
        @if(!empty($followed_users))
            @foreach($followed_users as $follow_user )
                <div id="user_info_item">
                    <table id="follow_user_table" class="table table-bordered">
                        <tr>
                            <th>ユーザー名:</th>
                            <th>{{ $follow_user }}</th>
                        </tr>
                        <tr>
                            <td>フォローユーザー数:</td>
                            <td>{{ $count_follow_user }}</td>
                        </tr>
                        <tr>
                            <td>フォロワーユーザー数:</td>
                            <td>{{ $count_follower_user }}</td>
                        </tr>
                    </table>   
                    <form id="follow_user_form" action="{{ route('follow.deletefunciton',$follow_user) }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $follow_user }}">
                        <button type="submit">フォロー解除</button>
                    </form> 
                    <br>
                </div>
            @endforeach 
        @else
            <p>現在、フォローしているユーザーはいません。</p>
        @endif    
    </div>
@endsection

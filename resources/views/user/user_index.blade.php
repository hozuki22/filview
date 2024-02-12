@extends('layouts.app')
@section('title','ユーザー一覧')
@section('content')
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
@endsection
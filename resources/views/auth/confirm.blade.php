<x-guest-layout>
    <x-slot name="header">
        <div id="header_inner">
            <h1 id="headline"><a href="">filview</a></h1>
        </div>
    </x-slot>
    <h1>登録内容確認</h1>
    <p>下記内容を登録します。確認してください。</p>

    <form method="POST" action="{{ route('store') }}">
        @csrf
        <table>
            <tr> 
                <th>ユーザーID</th>
                <td>{{ $user_name }}</td>
            </tr>
            <tr>
                <th>EMail</th>
                <td>{{ $email }}</td>
            </tr>
            <tr>
                <th>生年月日</th>
                <td>{{ substr($birthday,0,4) }}年{{ substr($birthday,5,2) }}月{{ substr($birthday,8,2) }}日</td>
                
            </tr>
        </table>
        <input type="hidden" name="user_name" value="{{ $user_name }}">
        <input type="hidden" name="email" value="{{ $email }}">
        <input type="hidden" name="birthday" value="{{ $birthday }}">
        <input type="hidden" name="password" value="{{ $password }}">
        <button type="button"><a href="{{ route('register') }}">入力画面に戻る</a></button>
        <input type="submit" value="登録する！" href="{{ route('store')}}">
    </form>
    <x-slot name="footer">
        <div id="footer">
                <p>&copy;2024 hozuki</p>
        </div>
    </x-slot>
</x-guest-layout>
<x-guest-layout>
    <x-slot name="header">
        <div id="header_inner">
            <h1 id="headline"><a href="">filview</a></h1>
        </div>
    </x-slot>
    <h1>メンバー登録が完了しました！</h1>
    <button><a href="{{ route('login') }}">ログイン画面へ戻る</a></button>
    <x-slot name="footer">
        <div id="footer">
                <p>&copy;2024 hozuki</p>
        </div>
    </x-slot>
</x-guest-layout>
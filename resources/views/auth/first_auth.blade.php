<x-guest-layout>
    <x-slot name="header">
        <div id="header_inner">
            <h1 id="headline"><a href="">filview</a></h1>
        </div>
    </x-slot>
    <h1>メンバー新規登録</h1>
    <h2>メールアドレスを登録します。入力してください。</h2>
    <form method="POST" action="{{ route('token_create') }}">
        @csrf
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('認証コード送信') }}
            </x-primary-button>
        </div>
    </form>

    <x-slot name="footer">
        <div id="footer">
            <p>&copy;2024 hozuki</p>
        </div>
    </x-slot>
</x-guest-layout>
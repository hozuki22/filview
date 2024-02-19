<x-guest-layout>
    <x-slot name="header">
        <div id="header_inner">
            <h1 id="headline"><a href="">filview</a></h1>
        </div>
    </x-slot>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <h1>パスワードの再設定</h1>
    <p>登録したメールアドレスと生年月日を入力してください。</p>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- birthday -->
        <div>
            <x-input-label for="birthday" :value="__('Birthday')" />
            <select name="year" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="" selected hidden>-</option>
                @for($year = 1930; $year < $currentyear; $year++)
                    <option value={{ $year }}>{{ $year }}</option>
                @endfor
            </select>　年
            <select name="month" class="form-select form-select-sm" aria-label=".form-select-sm example"class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="" selected hidden>-</option>
                @for($month = 1; $month < 13; $month++)
                    <option value="{{ $month }}">{{ $month }}</option>
                @endfor
            </select>　月
            <select name="day" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="" selected hidden>-</option>
                @for($day = 1; $day < 32; $day++)
                    <option value="{{ $day }}">{{ $day }}</option>
                @endfor
            </select>　日
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="btn btn-primary btn-lg">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
    <x-slot name="footer">
        <div id="footer">
            <p>&copy;2024 hozuki</p>
        </div>
    </x-slot>
</x-guest-layout>

<x-guest-layout>
    <x-slot name="header">
        <div id="header_inner">
            <h1 id="headline"><a href="">filview</a></h1>
        </div>
    </x-slot>

    <h1 class="new_user_title">新規ユーザー登録</h1>
    
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <form method="POST" action="{{ route('register.confirm') }}" class="new_user_form">
        @csrf
        <!-- user_name -->
        <div class="mt-4">
            <x-input-label for="user_name" :value="__('Name')" />
            <x-text-input id="user_name" class="form-control" type="text" name="user_name" :value="old('user_name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('user_name')" class="mt-2" />
        </div>


        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="form-control" type="email" name="email" :value=$user_email required autocomplete="username" disabled />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        
        <!-- birthday -->
        <div class="mt-4">
        <div>
            <p>生年月日</p>
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
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="form-control"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="form-control"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" aria-labelledby="passwordHelpBlock" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="new_submit_menu">
            <a class="already" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <br>
            <x-primary-button class="btn btn-primary btn-lg">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    
    <x-slot name="footer">
        <div id="footer">
            <p>&copy;2024 hozuki</p>
        </div>
    </x-slot>
</x-guest-layout>
    
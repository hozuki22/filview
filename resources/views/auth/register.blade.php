<x-guest-layout>
    <x-slot name="header">
        <div id="header_inner">
            <h1 id="headline"><a href="">filview</a></h1>
        </div>
    </x-slot>

    <h1 class="new_user_title">新規ユーザー登録</h1>
    <form method="POST" action="{{ route('register') }}" class="new_user_form">
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
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        
        <!-- birthday -->
        <div class="mt-4">
        <div>
            {!! $currentyear = date('Y') !!}
            <p>生年月日</p>
            <select name="year" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="">-</option>
                @for($year = 1930; $year < $currentyear; $year++)
                    <option value={{ $year }}>{{ $year }}</option>
                @endfor
            </select>　年
            <select name="month" class="form-select form-select-sm" aria-label=".form-select-sm example"class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="">-</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>　月
            <select name="day" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="">-</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
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

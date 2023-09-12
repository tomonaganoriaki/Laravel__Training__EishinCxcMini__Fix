<x-guest-layout>
<p class="title">オーナー用ログイン画面</p>
<style>
.title{
    font-weight: bold;
    color: red;
    font-size: 20px;
    margin-bottom: 20px;
    text-align: center;
}
</style>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('owner.login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('owner.password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('owner.password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
    <div class="buttonFlex">
        <a href="http://127.0.0.1:8000/login">Userログインはこちら</a>
        <a href="http://127.0.0.1:8000/admin/login">Adminログインはこちら</a>
        <style>
             .buttonFlex{
                display: flex;
                justify-content: space-between;
                margin-top: 20px;
                padding-top: 15px;
                border-top: 1px solid gray
                }
                .buttonFlex a{
                    background: #000;
                    color: #fff;
                    font-weight: bold;
                    font-size: 15px;
              padding: 10px 20px;
                border-radius: 9px;
                margin-top: 5px;
                }
                .buttonFlex a:hover{
                    opacity: 0.5;
                
                }
                button:hover{
                    opacity: 0.5;
                
                }
                a:hover{
                    opacity: 0.5;
                
                }
                .underRegister{
              width: 107px;
              display: block;
                }
        </style>
    </div>
</x-guest-layout>

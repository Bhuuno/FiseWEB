<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="/img/Logo-semfundo.png" alt="FiseWeb" style="width:400px; height:130px; margin-left: -2%; margin-top: -4%">
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Senha')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4" style="display: flex">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Lembrar-me') }}</span>
                </label>

                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" style="margin-left: 40%" href="{{ route('password.request') }}">
                            {{ __('Esqueceu a senha?') }}
                        </a>
                    @endif
                

            </div>

            <div class="flex items-center  mt-4" style="text-align: center; margin-left: 37%;">
                
                <x-button class="ml-3" style="background: #1010aa">
                    {{ __('Logar') }}
                </x-button>
            </div>

            <div class="text-center mt-4">
                <h1 class="fw-bold">Ainda não está cadastrado?</h1>
                @if (Route::has('register'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 " style="color: blue" href="{{ route('register') }}">
                        {{ __('Registrar-se') }}
                    </a>
                @endif
            </div>

        </form>
    </x-auth-card>
</x-guest-layout>

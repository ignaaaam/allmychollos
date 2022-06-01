<x-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="/images/logo-medium.png" alt="Allmychollos Logo" width="200" height="50">
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
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center text-white">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 cursor-pointer" name="remember">
                    <span class="ml-2 text-sm text-white cursor-pointer">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-center mt-4">
                @if (Route::has('register'))
                    <a class="text-center underline text-sm text-white hover:-translate-y-0.5 transition-transform" href="{{ route('register') }}">
                        {{ __('No tienes cuenta? Registrate!') }}
                    </a>
                @endif
                @if (Route::has('password.request'))
                    <a class="ml-4 text-center underline text-sm text-white hover:-translate-y-0.5 transition-transform" href="{{ route('password.request') }}">
                        {{ __('Olvidaste tu contraseña?') }}
                    </a>
                @endif
            </div>
                <x-button class=" mt-4 w-full">
                    {{ __('Log in') }}
                </x-button>

        </form>
    </x-auth-card>
</x-layout>

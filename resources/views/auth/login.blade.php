<x-guest-layout>
    <x-jet-authentication-card  style="margin: auto">
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
<div style="text-align: center; margin-top: 5em; margin-bottom: 5em">
    <div>
        <x-jet-label for="email" value="{{ __('Email') }}" style="margin-right: 2.2em" />
        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
    </div>

    <div class="mt-4">
        <x-jet-label for="password" value="{{ __('Password') }}"  style="margin-right: 0.47em"/>
        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password"  style="margin-left: 0.1em" required autocomplete="current-password" />
    </div>

    <div class="block mt-4">
        <label for="remember_me" class="flex items-center">
            <x-jet-checkbox id="remember_me" name="remember" />
            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
        </label>
    </div>

    <div class="flex items-center justify-end mt-4">
        @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif

        <x-jet-button class="btn hvr-hover" style="margin-left: 2em">
            {{ __('Log in') }}
        </x-jet-button>
    </div>
</div>

        </form>
    </x-jet-authentication-card>
</x-guest-layout>

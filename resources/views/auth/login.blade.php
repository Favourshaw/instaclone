<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>

            <x-text-input id="email" class="block mt-1 w-full tracking-tight" type="email" placeholder="Phone number, username, or email" name="email" :value="old
            ('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">


            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                          placeholder="Password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <x-primary-button class="w-full">
            {{ __('Log in') }}
        </x-primary-button>
        <!-- Remember Me
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div> -->

        <div class="flex flex-row w-full max-w-full items-center justify-between text-gray-500 py-3">
            <div class="w-full">
                <hr/>
            </div>
            <div class="px-3">
                OR
            </div>
            <div class="w-full">
                <hr/>
            </div>

        </div>
        <div class="flex items-center justify-center mt-4 text-blue-600">
            <span class="font-semibold text-blue-600">Log in with Facebook</span>
        </div>

        <div class="flex items-center justify-center mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif


        </div>
    </form>
</x-guest-layout>

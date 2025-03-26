<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-white  antialiased">
        <div class="min-h-screen flex flex-col  pt-6 sm:pt-0  max-w-[350px]">


            <div class="w-full p-8 sm:max-w-md mt-1 px-6  shadow-md overflow-hidden  border border-gray-500">
                {{ $slot }}
            </div>

            <div class="w-full p-8 sm:max-w-md mt-1 px-6  shadow-md overflow-hidden  border
            text-white border-gray-500 flex justify-center items-center mt-3">
                Don't have an account? <a
                href="{{ route('register') }}"
                class="font-semibold text-blue-600 "> Sign up</a>
            </div>

            <div class="flex justify-center items-center text-white pt-6">
                Get the app.
            </div>
        </div>
    </body>
</html>

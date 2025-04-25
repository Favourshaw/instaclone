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

<body class="font-sans antialiased">
    <div
        class="z-50 flex justify-between items-center md:hidden fixed top-0 right-0 left-0 p-4 text-white
        bg-black">

        <div class="flex flex-row gap-2">
            <div class="text-white">
                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <g data-name="arrow-ios-back">
                        <path
                            d="M13.83 19a1 1 0 0 1-.78-.37l-4.83-6a1 1 0 0 1 0-1.27l5-6a1 1 0 0 1 1.54 1.28L10.29 12l4.32 5.36a1 1 0 0 1-.78 1.64z">
                        </path>
                    </g>
                </svg>
            </div>

            <div>username</div>

        </div>
        <div>
            <x-mdi-dots-vertical />
        </div>

    </div>
    <div
        class="flex flex-row relative top-8 md:top-0 left-0 right-0 md:min-h-screen min-h-[90vh] w-full bg-gray-100
        dark:bg-black">
        <div class="hidden w-1/6  md:flex">

            @include('layouts.navigation')

        </div>
        <div class="w-full  md:w-5/6">
            <!-- Page Heading
            @isset($header)
    <header class="bg-white dark:bg-gray-800 shadow">
                                        <div class="w-full mx-auto py-6 ">
                        {{ $header }} hello
                                            </div>
                                        </header>
@endisset-->


            <!-- Page Content -->
            <main class="mx-auto max-w-[935px]">
                {{ $slot }}
            </main>

        </div>
    </div>
    <div class="flex justify-between items-center md:hidden fixed bottom-0 right-0 left-0 p-4 text-white bg-black">
        <div>hello</div>
        <div>hello</div>
        <div>hello</div>
        <div>hello</div>
        <div>hello</div>
    </div>
</body>

</html>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="w-full mx-auto">
            <div class="bg-white dark:bg-black max-w-[700px] p-4">
                <div class="flex p-0 pb-6 pt-6 md:p-6 text-gray-900 dark:text-gray-100">
                    <div class="m-auto mr-2 sm:mr-7 w-2/5">
                        <div class="w-20 md:w-36 h-20 md:h-36 flex justify-center items-center">
                            <img src="/storage/{{ Auth::user()->profile->image }}" class="w-full rounded-full" />
                        </div>
                    </div>
                    <div class="w-3/5">

                        @livewire('like-button', ['profile' => Auth::user()->profile])
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class=" md:hidden">

        <div class="w-full text-white mt-0 px-4">
            <div>{{ Auth::user()->name }}</div>
            <div>{{ Auth::user()->profile->description }}</div>
        </div>
    </div>
    {{-- <div class="w-full flex md:hidden flex-row flex-nowrap gap-2">
        @livewire('like-button', ['profile' => Auth::user()->profile])
    </div> --}}
    <div class="text-white mt-6"> <!-- Dark background -->
        <hr class="border border-gray-500" />
        <div class="flex justify-between items-center w-full max-w-sm mx-auto py-4 px-6">
            <div class="flex gap-2 items-center"><x-mdi-grid class="h-5 w-5 md:h-3 md:w-3 " /> <span
                    class="text-md md:text-xs">POSTS</span></div>
            <div class="flex gap-2 items-center"><x-mdi-movie-open-play-outline class="h-5 w-5 md:h-3 md:w-3 " /> <span
                    class="text-md md:text-xs">POSTS</span></div>
            <div class="flex gap-2 items-center"><svg class="w-5 h-5 md:h-3 md:w-3" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path
                        d="M12 22.75c-.7 0-1.41-.27-1.94-.8l-1.71-1.69c-.42-.42-1-.65-1.59-.65H6c-2.07 0-3.75-1.67-3.75-3.72V4.97c0-2.05 1.68-3.72 3.75-3.72h12c2.07 0 3.75 1.67 3.75 3.72v10.91c0 2.05-1.68 3.72-3.75 3.72h-.76a2.3 2.3 0 00-1.59.65l-1.71 1.69c-.53.54-1.24.81-1.94.81zm-6-20c-1.24 0-2.25 1-2.25 2.22v10.91c0 1.23 1.01 2.22 2.25 2.22h.76c.99 0 1.95.4 2.65 1.09l1.71 1.69c.49.48 1.28.48 1.77 0l1.71-1.69c.7-.69 1.66-1.09 2.65-1.09H18c1.24 0 2.25-1 2.25-2.22V4.97c0-1.23-1.01-2.22-2.25-2.22H6z">
                    </path>
                    <path
                        d="M12.07 9.7h-.17A2.681 2.681 0 019.3 7c0-1.49 1.21-2.7 2.7-2.7a2.701 2.701 0 01.09 5.4h-.02zM12 5.8c-.66 0-1.2.54-1.2 1.2 0 .65.51 1.18 1.15 1.2 0-.01.06-.01.13 0 .63-.04 1.12-.56 1.12-1.2 0-.66-.54-1.2-1.2-1.2zM12 16.7c-1.14 0-2.28-.3-3.17-.89-.84-.56-1.33-1.37-1.33-2.23 0-.86.48-1.68 1.33-2.24 1.78-1.18 4.56-1.18 6.33 0 .84.56 1.33 1.38 1.33 2.23 0 .86-.48 1.67-1.33 2.24-.88.6-2.02.89-3.16.89zm-2.34-4.11c-.43.29-.66.64-.66.99s.24.7.66.99c1.27.85 3.4.85 4.67 0 .43-.29.67-.64.66-.99 0-.35-.24-.7-.66-.99-1.26-.85-3.4-.85-4.67 0z">
                    </path>
                </svg> <span class="text-md md:text-xs">POSTS</span></div>
        </div>
    </div>
    <div class="w-full max-w-full flex-wrap flex  ">

        @foreach (Auth::user()->posts as $post)
            <div class="w-1/3 p-2">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-full">
                </a>
            </div>
        @endforeach
    </div>

</x-app-layout>

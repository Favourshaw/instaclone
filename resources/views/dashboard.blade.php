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
                        <img src="{{  Auth::user()->profile->profileImage() }}" class="w-full rounded-full" />
                        </div>
                    </div>
                    <div class="w-3/5">
                        <div class="hidden md:flex flex-row items-center justify-start gap-3">
                        <div>{{ Auth::user()->name }}</div>
                        <div class="">
                            <x-primary-button class="">
                                {{ __('Follow') }}
                            </x-primary-button>
                        </div>
                            <div class="">
                                <x-secondary-button class="bggra">
                                    {{ __('Message') }}
                                </x-secondary-button>
                            </div>
                        <div>
                            ---
                        </div>
                        </div>
                        <div class="flex flex-nowrap justify-between items-center max-w-72">
                            <div class="flex flex-col sm:flex-row text-center sm:text-left">
                                <p class="font-semibold sm:pr-1">50</p>
                                <p>posts</p>
                            </div>
                            <div class="flex flex-col sm:flex-row text-center sm:text-left">
                                <p class="font-semibold sm:pr-1">50</p>
                                <p>posts</p>
                            </div>

                            <div class="flex flex-col sm:flex-row text-center sm:text-left">
                                <p class="font-semibold sm:pr-1">50</p>
                                <p>posts</p>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="w-3/5 text-white md:ml-auto px-0 md:px-6 -mt-1 md:-mt-12">
                    <div>{{ Auth::user()->name }}</div>
                    <div>{{ Auth::user()->profile->description }}</div>
                </div>
                <div class="w-full flex md:hidden flex-row flex-nowrap gap-2">
                    <div class="w-1/2">
                        <x-primary-button class="w-full">
                            {{ __('Follow') }}
                        </x-primary-button>
                    </div>
                    <div class="w-1/2">
                        <x-secondary-button class="w-full">
                            {{ __('Message') }}
                        </x-secondary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

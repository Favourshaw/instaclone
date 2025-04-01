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
                            <img src="/storage/{{  $user->profile->image }}" class="w-full rounded-full"/>
                        </div>
                        <a href="/profile/{{ $user->id }}/edit" :active="/profile/{{ $user->id }}/edit">
                            {{ __('Profile') }}
                        </a>
                    </div>
                    @livewire('like-button', ['profile' => $user->profile])

                </div>
                <div class="w-3/5 text-white md:ml-auto px-0 md:px-1 -mt-1 md:-mt-12">
                    <div>{{ $user->username }}</div>
                    <div>{{$user->profile->title}}</div>
                    <div>{{$user->profile->url}}</div>
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
            <div class="w-full max-w-full flex-wrap flex  ">
                @foreach($user->posts as $post)
                    <div class="w-1/3 p-2">
                        <a href="/p/{{$post->id }}">
                            <img src="/storage/{{$post->image}}" class="w-full">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

<div class="w-3/5">
    <div class="hidden md:flex flex-row items-center justify-start gap-3">
        <div>{{ $profile->user->username }}</div>
        <div class="">
            <!--<x-primary-button class="">
                                    {{ __('Follow') }}
            </x-primary-button>-->
        </div>
        <div class="">
            <x-secondary-button class="">
                {{ __('Message') }}
            </x-secondary-button>
        </div>
        <div>
            <div>
                <button
                    wire:click="toggleFollow"
                    wire:loading.attr="disabled"
                    @class([
                            'items-center px-5 py-2  my-4  tracking-tight  rounded flex
                    justify-center
                    align-middle
            border border-transparent rounded-md font-semibold text-xs text-white
                focus:outline-none focus:ring-2
             focus:ring-offset-2 transition ease-in-out duration-150',
                            'focus:ring-indigo-500 focus:bg-blue-500 active:bg-blue-900 bg-blue-600
            hover:bg-blue-800 text-white'  => !$isFollowing,
                            'focus:ring-indigo-500 focus:bg-blue-500 active:bg-gray-900 bg-blue-600
            hover:bg-gray-500 text-gray-800' => $isFollowing
                        ])>
        <span wire:loading.remove>
            {{ $isFollowing ? 'Following' : 'Follow' }}
        </span>
                    <span wire:loading>
            <svg class="animate-spin h-4 w-4 inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </span>
                </button>


            </div>


        </div>
    </div>
    <div class="flex flex-nowrap justify-between items-center max-w-72">
        <div class="flex flex-col sm:flex-row text-center sm:text-left">
            <p class="font-semibold sm:pr-1">{{ $profile->user->posts->count() }}</p>
            <p>posts</p>
        </div>
        <div class="flex flex-col sm:flex-row text-center sm:text-left">
            <p class="font-semibold sm:pr-1">{{ number_format($followersCount) }} </p>
            <p>{{ Str::plural('follower', $followersCount) }}</p>
        </div>

        <div class="flex flex-col sm:flex-row text-center sm:text-left">
            <p class="font-semibold sm:pr-1">
                {{ $profile->followers_count }}</p>
            <p>Following</p>
        </div>

    </div>
</div>

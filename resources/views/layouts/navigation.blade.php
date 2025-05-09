<nav x-data="{ open: false }"
    class="w-full bg-white dark:bg-black border border-transparent border-r-gray-100 dark:border-r-gray-700 ">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-4 text-lg">
        <div class="flex flex-col justify-between h-16 gap-6">
            <div class="flex flex-col justify-center gap-10">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links
                <div class="">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <span class="flex flex-row items-center justify-start gap-4">
                            <x-mdi-home class="h-7 w-7 "/>
                            <span>
                                {{ __('Home') }}
                            </span>

                        </span>
                        
                    </x-nav-link>


                </div> -->

                <div class=" ">


                    <a class="text-white " href="{{ route('dashboard') }}">

                        <span class="flex flex-row items-center justify-start gap-4">
                            <x-mdi-home class="h-7 w-7 " />
                            <span>
                                {{ __('Home') }}
                            </span>

                        </span>
                    </a>

                </div>


                <div class=" ">

                    @auth
                        @can('save', Auth::user()->profile)
                            <a class="text-white " href="#">

                                <span class="flex flex-row items-center justify-start gap-4">
                                    <x-css-search class="h-7 w-7 " />
                                    <span>
                                        {{ __('Search') }}
                                    </span>

                                </span>
                            </a>
                        @endcan
                    @endauth
                </div>
                <div class=" ">

                    @auth
                        @can('save', Auth::user()->profile)
                            <a class="text-white " href="#">

                                <span class="flex flex-row items-center justify-start gap-4">
                                    <x-mdi-compass-outline class="h-7 w-7 " />
                                    <span>
                                        {{ __('Explore') }}
                                    </span>

                                </span>
                            </a>
                        @endcan
                    @endauth
                </div>
                <div class=" ">


                    <a class="text-white " href="#">

                        <span class="flex flex-row items-center justify-start gap-4">
                            <x-mdi-movie-open-play-outline class="h-7 w-7 " />
                            <span>
                                {{ __('Reels') }}
                            </span>

                        </span>
                    </a>

                </div>
                <div class=" ">


                    <a class="text-white " href="#">

                        <span class="flex flex-row items-center justify-start gap-4">
                            <x-mdi-facebook-messenger class="h-7 w-7 " />
                            <span>
                                {{ __('Messages') }}
                            </span>

                        </span>
                    </a>

                </div>
                <div class=" ">


                    <a class="text-white " href="#">

                        <span class="flex flex-row items-center justify-start gap-4">
                            <x-mdi-heart-outline class="h-7 w-7 " />
                            <span>
                                {{ __('Notifications') }}
                            </span>

                        </span>
                    </a>

                </div>
                <div class=" ">

                    @auth
                        @can('save', Auth::user()->profile)
                            <a class="text-white " href="/p/create/" :active="/p/create">

                                <span class="flex flex-row items-center justify-start gap-4">
                                    <x-css-add-r class="h-7 w-7 " />
                                    <span>
                                        {{ __('Create') }}
                                    </span>

                                </span>
                            </a>
                        @endcan
                    @endauth
                </div>
                <div class="">

                    @auth
                        @can('save', Auth::user()->profile)
                            <a class="text-white" href="/profiles/{{ Auth::user()->id }}/info"
                                :active="/profiles/{{ Auth::user()->id }} / info">
                                <span class="flex flex-row items-center justify-start gap-4">
                                    <img src="/storage/{{ Auth::user()->profile->image }}" class="w-7 h-7 rounded-full" />
                                    <span>
                                        {{ __('Profile') }}
                                    </span>

                                </span>
                            </a>
                        @endcan
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-7 w-7" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Home') }}
            </x-responsive-nav-link>
        </div>
        @auth
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</nav>

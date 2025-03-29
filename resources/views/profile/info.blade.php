<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="post" action="/profiles/{{ $user->id }}" enctype="multipart/form-data" class="mt-6
                    space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <x-input-label for="title" :value="__('title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old
                            ('title', $user->profile->title)" required autofocus autocomplete="title" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('description')" />
                            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full"
                                          :value="old
                            ('description', $user->profile->description)" required autofocus autocomplete="description" />
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <div>
                            <x-input-label for="url" :value="__('Url')" />
                            <x-text-input id="url" name="url" type="text" class="mt-1 block w-full" :value="old
                            ('url', $user->profile->url)" required autofocus autocomplete="url" />
                            <x-input-error class="mt-2" :messages="$errors->get('url')" />
                        </div>

                        <div>
                            <x-input-label for="image" :value="__('Profile Image')" />
                            <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" :value="old
                            ('image', $user->profile->image)"  />
                            <x-input-error class="mt-2" :messages="$errors->get('image')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                            @if (session('status') === 'profile-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</x-app-layout>

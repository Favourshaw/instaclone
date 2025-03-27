<x-app-layout>


    <form action="/p" enctype="multipart/form-data" method="post">
        @csrf
        <div class="">
            <div class="mt-4">
                <x-input-label for="caption" :value="__('Post Caption')"/>
                <x-text-input id="caption" class="block mt-1 w-full" type="text" name="caption" :value="old
            ('caption')"
                              required autocomplete="caption"/>
                <x-input-error :messages="$errors->get('caption')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-input-label for="image" :value="__('Post Image')"/>
                <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old
            ('image')"
                              required autocomplete="image"/>
                <x-input-error :messages="$errors->get('image')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-primary-button class="w-full my-4 bg-blue-600 hover:bg-blue-800 tracking-tight text-white rounded flex
        justify-center
        align-middle">
                    {{ __('Add New Post') }}
                </x-primary-button>
            </div>

        </div>
    </form>
</x-app-layout>

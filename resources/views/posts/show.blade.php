<x-app-layout>


    <div class="">
        <div class="w-full mx-auto">

            <div class="w-full max-w-full flex-wrap flex  ">
                <div class=" flex justify-center items-center p-6">
                    <div class="w-1/2">
                        <img src="/storage/{{ $post->image }}" class="w-full">
                    </div>
                    <div class="w-1/2 text-white">
                        <div class="w-full">
                            <div>
                                <h3>{{$post->user->username}}</h3>
                                <p>{{$post->caption}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>


    <div class="">
        <div class="w-full mx-auto">

            <div class="w-full max-w-full flex-wrap flex  ">
                <div class=" flex justify-center items-center p-6">
                    <div class="w-1/2">
                        <img src="/storage/{{ $post->image }}" class="w-full">
                    </div>
                    <div class="w-1/2 h-full text-white border border-spacing-1">
                        <div class="w-full ">
                            <div class="flex flex-row items-center gap-3 border-b border-spacing-1 p-4">
                                <div>
                                    <img src="/storage/{{ $post->user->profile->image }}" class="w-full rounded-full
                                    max-w-[40px]"/>
                                </div>
                                <div>
                                    <a href="/profiles/{{ $post->user->id }}">
                                        <span>{{$post->user->username}}</span></a>
                                </div>


                            </div>
                            <div class="flex flex-row items-center gap-3  p-4">
                                <div>
                                    <img src="/storage/{{ $post->user->profile->image }}" class="w-full rounded-full
                                    max-w-[40px]"/>
                                </div>
                                <div>
                                    <a href="/profiles/{{ $post->user->id }}">
                                        <span>{{$post->user->username}}</span></a>
                                </div>

                                <p>{{$post->caption}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

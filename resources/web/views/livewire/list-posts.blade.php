<div>
    <div class="grid gap-4 md:gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 2xl:grid-cols-4" id="posts-start">
        @forelse($this->posts as $post)
            <x-web::post :$post wire-key="posts-{{ $post->getKey() }}" />
        @empty
            <div class="col-span-full flex flex-col justify-center items-center">
                <x-heroicon-s-folder-open class="h-16 w-16 mb-8" />
                <h2 class="text-3xl">
                    {{ __('There is no posts yet') }}
                </h2>
            </div>
        @endforelse
    
    </div>
    
    <div class="my-10">
        {{ $this->posts->links(data: ['scrollTo' => 'main']) }}
    </div>

</div>

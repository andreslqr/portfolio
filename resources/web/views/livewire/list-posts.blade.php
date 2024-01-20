<div>
    <div class="grid gap-4 md:gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 2xl:grid-cols-4" id="posts-start">
        @foreach($this->posts as $post)
            <x-web::post :$post wire-key="posts-{{ $post->getKey() }}" />
        @endforeach
    
    </div>
    
    <div class="my-10">
        {{ $this->posts->links(data: ['scrollTo' => 'main']) }}
    </div>

</div>

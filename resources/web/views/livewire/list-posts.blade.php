<div class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
    @foreach($this->posts as $post)
        <x-web::post :$post wire-key="posts-{{ $post->getKey() }}" />
    @endforeach

    {{ $this->posts->links() }}
</div>

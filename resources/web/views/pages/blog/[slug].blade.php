<?php

use function Laravel\Folio\name;
use function Laravel\Folio\render;
use Illuminate\View\View;
use App\Models\Blog\Post;

name('blog.show');

render(function (View $view, $slug) {

    $post = Post::select('content')->webQuery()->webFind($slug)->firstOrFail();
    $relatedPosts = $post->relatedPosts()->select('short_description')->webQuery()->limit(4)->inRandomOrder()->get();
    $latestPosts = Post::select('short_description')->webQuery()->whereKeyNot($post->getKey())->limit($relatedPosts->isEmpty() ? 8 : 4)->get();

    return $view
        ->with('post', $post)
        ->with('relatedPosts', $relatedPosts)
        ->with('latestPosts', $latestPosts);
});

?>

<x-web::layout class="bg-gradient-to-b from-base-100 to-base-300">
    <div class="container mx-auto px-8 sm:px-4 min-h-screen">
        <div class="mt-10">

        </div>
        <x-web::breadcrumb>
            <x-web::breadcrumb.home />
            <x-web::breadcrumb.blog />
            <x-web::breadcrumb.post active :slug="$post->slug" :title="$post->title" />
        </x-web::breadcrumb>
        <div class="mt-10 mb-4 max-w-4xl mx-auto">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-8">
                {{ $post->getWebTitle() }}
            </h1>
            <p class="mt-4 text-sm mb-8">
                <span>{{ __('Published') }}</span> <span>{{ $post->getWebPublishedAt() }}</span> <span>{{ __('by') }}</span> <span>{{ $post->getWebAuthor() }}</span>
            </p>
            <img class="rounded-lg aspect-univision shadow-2xl" src="{{ $post->getWebImage() }}" alt="{{ __('image of :description', ['description' => $post->getWebTitle()]) }}">
            <div id="content" class="mt-10">
                {{ $post->getWebContent() }}
            </div>
            <div class="mt-10">
    
            </div>
            @if($post->tags->isNotEmpty())
                <div>
                    <x-web::divider start>
                        {{ __('Tags') }}
                    </x-web::divider>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('blog.index', ['tag' => $tag->name]) }}">
                                <x-web::badge class="badge-secondary px-4">
                                    {{ $tag->getWebName() }}
                                </x-web::badge>
                            </a>
                        @endforeach
                    </div>
                    
                </div>
            @endif
            <x-web::divider />
        </div>  
        @if($relatedPosts->isNotEmpty())
            <div class="my-10">

                <h2 class="text-4xl font-bold text-center lg:text-start mb-8">
                    {{ __('Related posts') }}
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach ($relatedPosts as $post)
                        <x-web::post :post="$post" />
                    @endforeach
        
                </div>
            </div>
        @endif
        @if($latestPosts->isNotEmpty())
            <div class="my-10">

                <h2 class="text-4xl font-bold text-center lg:text-start mb-8">
                    {{ __('Latest posts') }}
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach ($latestPosts as $post)
                        <x-web::post :post="$post" />
                    @endforeach
        
                </div>
            </div>
        @endif
    </div>
</x-web::layout>
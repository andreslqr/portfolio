@props([
    'post'
])

<div {{ $attributes->merge(['class' => 'relative group ']) }}>
    <div class="w-full aspect-univision" wire:loading.class="hidden">
        <img src="{{ $post->getWebImage() }}" class="max-w-full max-h-full mx-auto rounded-lg group-hover:brightness-125 group-hover:-translate-y-2 group-hover:scale-x-105 transition ease-in-out duration-100" alt="{{ __('image of :description', ['description' => $post->getWebTitle()]) }}">
    </div>
    <div class="w-full aspect-univision rounded-lg skeleton hidden" wire:loading.class.remove="hidden">
    </div>
    <h3 class="mt-3 text-xl font-semibold group-hover:text-accent" wire:loading.class="hidden">
        {{ $post->getWebTitle() }}
    </h3>
    <div class="hidden mt-3" wire:loading.class.remove="hidden">
        <div class="mb-2 w-full h-6 skeleton">
        </div>
        <div class="w-3/4 h-6 skeleton">
        </div>
    </div>
    <p class="mt-3 text-base-content text-sm group-hover:underline" wire:loading.class="hidden">
        {{ $post->getWebShortDescription() }}
    </p>
    <div class="mt-3 hidden" wire:loading.class.remove="hidden">
        <div class="mb-2 w-full h-4 skeleton">
        </div>
        <div class="w-1/2 h-4 skeleton">
        </div>
    </div>
    <a href="{{ $post->getWebUrl() }}" class="absolute top-0 left-0 w-full h-full"></a>
</div>
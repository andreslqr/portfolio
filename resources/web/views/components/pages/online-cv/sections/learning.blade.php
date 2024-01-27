@props([
    'profile'
])

<div {{ $attributes->merge([]) }}> 
    <x-web::divider class="w-full md:w-3/4 lg:w-1/3 divider-secondary md:divider-start">
        <h2 class="text-3xl font-bold">
            {{ __('Learning') }}
        </h2>
    </x-web::divider>

    <div id="description">
<x-markdown class="mt-8">
{{ $profile->description }}
</x-markdown>
    </div>
</div>
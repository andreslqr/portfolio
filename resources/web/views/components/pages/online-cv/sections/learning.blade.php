@props([
    'profile'
])

<div {{ $attributes->merge([]) }}> 
    <x-web::divider class="w-full md:w-3/4 lg:w-1/3 divider-secondary md:divider-start">
        <h2 class="text-3xl font-bold">
            {{ __('Learning') }}
        </h2>
    </x-web::divider>
    <div class="mt-4">
        <h3 class="text-2xl font-semibold text-center">
            {{ __('Certifications') }}
        </h3>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-6">
        @foreach ($profile->certifications as $certification)
            <a class="card hover:animate-pulse shadow-sm bg-gradient-to-br from-base-300 to-base-200 to-60%" href="{{ $certification['url'] }}" rel="noopener noreferrer" target="_blank">
            
                <div class="card-body p-2 flex-row gap-2 items-center">
                    <div class="w-16 aspect-square">
                        <img class="rounded-box" src="{{ asset(Storage::url($certification['logo'])) }}" alt="{{ __('image of :description', ['description' => $certification['name']]) }}">
                    </div>
                    <div class="flex flex-col">
                        <h4 class="text-lg font-semibold">
                            {{ $certification['name'] }}
                            <x-web::badge class="badge-accent badge-sm">
                                {{ carbon($certification['start_at'])->format('M Y') }}
                                @if($certification['end_at'])
                                    - 
                                    {{ carbon($certification['end_at'])->format('M Y') }}
                                @endif
                            </x-web::badge>
                        </h4>
                        <div class="">
<x-markdown class="">
    {{ $certification['description'] }}
</x-markdown>

                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <div class="mt-8">
        <h3 class="text-2xl font-semibold text-center">
            {{ __('School career') }}
        </h3>
    </div>
    <x-web::timeline vertical compact icon-start>
            @foreach ($profile->schoolCareer as $school)
                <x-web::timeline.item>
                    <x-slot:middle>
                        <x-heroicon-s-academic-cap class="h-4 w-4" />
                    </x-slot:middle>
                    <x-slot:end class="mb-10 w-full">
                        <div class="flex justify-between w-full">
                            <time class="font-mono italic text-sm">
                                {{ carbon($school['start_at'])->format('F Y') }}
                                - 
                                {{ $school['end_at'] ? carbon($school['end_at'])->format('F Y') : __('Currently') }}
                            </time>
                            <small>
                                {{ carbon($school['start_at'])->diffForHumans(carbon($school['end_at']), 1) }}
                            </small>

                        </div>
                        @if($school['logo'])
                            <div class="aspect-square w-16 mt-4">
                                <img src="{{ asset(Storage::url($school['logo'])) }}" alt="{{ __('image of :description', ['description' => $school['school']]) }}">
                            </div>
                        @endif
                        <h4 class="text-xl mt-4 font-black">
                            {{ $school['school'] }}
                        </h4>
                        <div class="mt-6">
<x-markdown class="wysiwyg">
{{ $school['description'] }}
</x-markdown>
                        </div>
                    </x-slot:end>
                </x-web::timeline.item>
            @endforeach
        </x-web::timeline>
</div>
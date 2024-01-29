@props([
    'profile'
])

<div {{ $attributes->merge([]) }}> 
    <x-web::divider class="w-full md:w-3/4 lg:w-1/3 divider-secondary md:divider-start">
        <h2 class="text-3xl font-bold">
            {{ __('Works') }}
        </h2>
    </x-web::divider>

    <div class="mt-8">
        <x-web::timeline vertical compact icon-start>
            @foreach ($profile->workExperience as $company)
                <x-web::timeline.item>
                    <x-slot:middle>
                        <x-heroicon-s-building-office-2 class="h-4 w-4" />
                    </x-slot:middle>
                    <x-slot:end class="mb-10 w-full">
                        <div class="flex justify-between w-full">
                            <time class="font-mono italic text-sm">
                                {{ carbon($company['start_at'])->format('F Y') }}
                                - 
                                {{ $company['end_at'] ? carbon($company['end_at'])->format('F Y') : __('Currently') }}
                            </time>
                            <small>
                                {{ carbon($company['start_at'])->diffForHumans(carbon($company['end_at']), 1) }}
                            </small>

                        </div>
                        @if($company['logo'])
                            <div class="aspect-univision w-24 mt-4">
                                <img src="{{ asset(Storage::url($company['logo'])) }}" alt="{{ __('image of :description', ['description' => $company['company']]) }}">
                            </div>
                        @endif
                        <h3 class="text-xl mt-4 font-black">
                            {{ $company['company'] }}
                        </h3>
                        <div class="mt-6">
<x-markdown class="wysiwyg">
{{ $company['description'] }}
</x-markdown>
                        </div>
                        <div class="mt-8">
                            <x-web::timeline vertical compact icon-start>
                                @foreach ($company['roles'] as $role)
                                    <x-web::timeline.item>
                                        <x-slot:middle>
                                            <x-heroicon-s-user-circle class="h-4 w-4" />
                                        </x-slot:middle>
                                        <x-slot:end class="mb-10 w-full">
                                            <div class="flex justify-between w-3/4">
                                                <time class="font-mono italic text-sm">
                                                    {{ carbon($role['start_at'])->format('F Y') }}
                                                    - 
                                                    {{ $role['end_at'] ? carbon($role['end_at'])->format('F Y') : __('Currently') }}
                                                </time>
                                                <small>
                                                    {{ carbon($role['start_at'])->diffForHumans(carbon($role['end_at']), 1) }}
                                                </small>
                                            </div>
                                            <h3 class="text-xl mt-4 font-black">
                                                {{ $role['name'] }}
                                            </h3>
                                            <div class="mt-6">
<x-markdown class="wysiwyg">
{{ $role['description'] }}
</x-markdown>
                                            </div>
                                        </x-slot:end>
                                    </x-web::timeline.item>
                                @endforeach
                            </x-web::timeline>
                                
                        </div>
                    </x-slot:end>
                </x-web::timeline.item>
            @endforeach
        </x-web::timeline>
    </div>

</div>
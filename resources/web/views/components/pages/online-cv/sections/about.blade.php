@props([
    'profile'
])

<div {{ $attributes->merge([]) }}> 
    <x-web::divider class="w-full md:w-3/4 lg:w-1/3 divider-secondary md:divider-start">
        <h2 class="text-3xl font-bold">
            {{ __('About me') }}
        </h2>
    </x-web::divider>
    <div id="description">
<x-markdown class="mt-8 wysiwyg">
{{ $profile->description }}
</x-markdown>
    </div>

    <div class="mt-8">
        <h3 class="text-3xl font-bold">
            {{ __('Skills') }}
        </h3>
        <div class="mt-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16">
                @foreach($profile->skills as $skill)
                    @php 
                        $className = "skill-" . str()->random();
                    @endphp
                    <div class="form-control">
                        <label class="label cursor-pointer gap-y-2 flex-col items-start">
                        <span class="label-text">{{ $skill['name'] }}</span> 
                            <x-web::form.input.range :class="$className" min="0" max="100" disabled />
                            <div class="w-full flex justify-between text-xs px-2 font-thin">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                              </div>
                        </label>
                    </div>
                    @push('styles')
                        <style>
                            .{{ $className }} {
                                --range-shdw: {{ $skill['color'] }};
                            }
                        </style>
                    @endpush
                @endforeach

            </div>
        </div>
    </div>
    <div class="mt-8">
        <h3 class="text-3xl font-bold">
            {{ __('Soft kills') }}
        </h3>
        <div class="mt-6">
            <div class="flex flex-wrap gap-2">
                @foreach($profile->softSkills as $softSkill)
                    @php 
                        $className = "soft-skill-" . str()->random();
                    @endphp
                    <x-web::badge :class="$className">
                        {{ $softSkill['name'] }}
                    </x-web::badge>
                    @push('styles')
                        <style>
                            .{{ $className }} {
                                background-color: {{ $softSkill['color'] }};
                                color: {{ contrastColor($softSkill['color']) }}
                            }
                        </style>
                    @endpush
                @endforeach

            </div>
        </div>
    </div>
</div>
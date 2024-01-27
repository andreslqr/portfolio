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
<x-markdown class="mt-8">
{{ $profile->description }}
</x-markdown>
    </div>

    <div class="mt-8">
        <h3 class="text-3xl font-bold">
            {{ __('Skills') }}
        </h3>
        <div class="mt-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                @foreach($profile->skills as $skill)
                    <div class="form-control">
                        <label class="label cursor-pointer gap-y-2 flex-col items-start">
                        <span class="label-text">{{ $skill['name'] }}</span> 
                        <x-web::form.input.range :class='str($skill["name"])->slug()->prepend("skill-")->append("-{$loop->index}")' min="0" max="100" disabled />
                        </label>
                    </div>
                    @push('styles')
                        <style>
                            {{ str($skill['name'])->slug()->prepend('.skill-')->append("-{$loop->index}") }} {
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
                    <x-web::badge :class='str($softSkill["name"])->slug()->prepend("soft-skill-")->append("-{$loop->index}")'>
                        {{ $softSkill['name'] }}
                    </x-web::badge>
                    @push('styles')
                        <style>
                            {{ str($softSkill['name'])->slug()->prepend('.soft-skill-')->append("-{$loop->index}") }} {
                                background-color: {{ $softSkill['color'] }};
                            }
                        </style>
                    @endpush
                @endforeach

            </div>
        </div>
    </div>
</div>
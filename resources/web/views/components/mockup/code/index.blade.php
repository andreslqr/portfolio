@props([
    'language',
    'copyData' => false
])

<div x-data>
    @if($copyData)
        <div class="w-full flex justify-end">
            <div data-tip="{{ __('Copied!') }}" x-copy="{{ $copyData }}">
                <x-web::button class="btn-neutral btn-sm rounded-b-none">
                    <x-heroicon-o-clipboard-document-list class="w-4 h-4" />
                    {{__('Copy') }}       
                </x-web::button>
            </div>
        </div>
    @endif
    <div {{ $attributes->merge(['class' => 'mockup-code'])->class(['rounded-tr-none' => $copyData]) }}>
        {{ $slot }}
    </div>
</div>
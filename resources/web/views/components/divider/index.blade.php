@props([
    'start' => false,
    'end' => false
])

<div class="flex flex-col w-full">
    <div {{ $attributes->merge(['class' => 'divider'])->class(['divider-start' => $start, 'divider-end' => $end]) }}>
        {{ $slot }}
    </div>
</div>
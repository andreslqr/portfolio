@props([
])

<div {{ $attributes->merge(['class' => 'avatar']) }}>
    {{ $slot }}
</div>
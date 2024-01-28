@props([
    'active' => false,
    'disabled' => false,
    'external' => false
])

<li class="{{ $disabled ? 'disabled' : '' }} max-w-full">
    <a {{ $attributes->merge(['rel' => $external ? 'noopener noreferrer' : false, 'target' => $external ? '_blank' : false])->class(['active' => $active]) }}>
        {{ $slot }}
    </a>
</li>
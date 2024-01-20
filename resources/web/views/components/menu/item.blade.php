@props([
    'active' => false,
    'disabled' => false
])

<li class="{{ $disabled ? 'disabled' : '' }}">
    <a {{ $attributes->class(['active' => $active]) }}>
        {{ $slot }}
    </a>
</li>
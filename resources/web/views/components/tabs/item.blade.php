@props([
    'active' => false
])

<a role="tab" class="tab" {{ $attributes->merge(['class' => 'tab', 'role' => 'tab'])->class(['tab-active' => $active]) }}>
    {{ $slot }}
</a>
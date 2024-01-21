@props([
    'dataTip'
])

<div {{ $attributes->merge(['class' => 'tooltip', 'data-tip' => $dataTip]) }}>
    {{ $slot }}
</div>
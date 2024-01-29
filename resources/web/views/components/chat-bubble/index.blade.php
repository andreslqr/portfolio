@props([
    'right' => false,
    'time'
])

<div class="chat {{ $right ? 'chat-end' : 'chat-start' }}">
    <div {{ $attributes->merge(['class' => 'chat-bubble']) }}>
        {{ $slot }}
    </div>
    @isset($time)
        <div class="chat-footer opacity-50">
            {{ $time }}
        </div>
    @endisset
</div>
@props([
    'prefix'
])

@aware([
    'language'
])

<pre {{ $attributes->merge(['data-prefix' => $prefix]) }}><code x-code="{{ $language }}">{{ $slot }}</code></pre>
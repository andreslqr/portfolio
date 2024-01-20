@props([
    'post'
])

<a {{ $attributes->merge(['href' => $post->getWebUrl()])}}>
    {{ $post->title }}
</a>
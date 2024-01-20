@props([
    'title',
    'slug',
    'active' => false
])
<x-web::breadcrumb.item :active="$active" :href="route('blog.show', ['slug' => $slug])">
    {{ $title }}
</x-web::breadcrumb.item>
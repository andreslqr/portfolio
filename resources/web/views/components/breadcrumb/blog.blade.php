@props([
    'active' => false
])
<x-web::breadcrumb.item :active="$active" :href="route('blog.index')">
    <x-icon :name="$active ? 'heroicon-s-pencil-square' : 'heroicon-o-pencil-square'" class="h-4 w-4" /> 
    {{ __('Blog') }}
</x-web::breadcrumb.item>
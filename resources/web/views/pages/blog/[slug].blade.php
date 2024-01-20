<?php

use function Laravel\Folio\name;
use function Laravel\Folio\render;
use Illuminate\View\View;
use App\Models\Blog\Post;

name('blog.show');

render(fn (View $view, $slug) => $view->with('post', Post::where('slug->' . app()->getLocale(), $slug)->firstOrFail()));

?>

<x-web::layout>
    <x-web::breadcrumb>
        <x-web::breadcrumb.home />
        <x-web::breadcrumb.blog />
        <x-web::breadcrumb.post active :slug="$post->slug" :title="$post->title" />
    </x-web::breadcrumb>
</x-web::layout>
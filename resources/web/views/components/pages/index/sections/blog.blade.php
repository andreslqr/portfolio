@props([
    'posts'
])

@if($posts?->count())

    <section {{ $attributes->merge(['class' => 'hero min-h-92-screen bg-base-100']) }}>
        <div class="hero-content flex-col h-full container mx-auto">
            <h2 class="text-4xl font-bold text-center my-10 sm:mt-6">
                {{ __("Check my latest posts") }}
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-8">
                @foreach ($posts as $post)
                    <x-web::post :post="$post" />
                @endforeach
            </div>
            <div class="flex justify-center my-6">
                <x-web::button class="btn-primary" as-link :href="route('blog.index')">
                    {{ __('See more') }}
                </x-web::button>
            </div>

        </div>
    </section>
@endif
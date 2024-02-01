<section {{ $attributes->merge(['class' => 'hero min-h-92-screen bg-image-4'])}}>
    <div class="hero-overlay bg-neutral bg-opacity-80"></div>
    <div class="hero-content flex-col text-neutral-content">
        
        <div class="w-48 aspect-square rounded-full flex justify-center items-center ring ring-primary ring-offset-base-100 drop-shadow-2xl">
            <x-heroicon-o-code-bracket class="text-primary w-36 h-36" />
        </div>
        
        <div>
            <h2 class="text-5xl font-bold text-secondary text-start md:text-center">
                {{ __("Check the source code of this site") }}
            </h2>
            <p class="py-6 gap-3 text-xl text-start md:text-center mx-0 lg:mx-16">
                {{ __('Check the repository in Github or contact me if you have in mind a project :).') }}
            </p>
            <div class="flex justify-center gap-x-4 mt-4">
                <x-web::button class="btn-neutral" as-link  external href="https://github.com/andreslqr/portfolio">
                <x-feathericon-github class="" />
                    {{ __('Github') }}
                </x-web::button>
                <x-web::button class="btn-primary btn-outline" as-link :href="route('contact')">
                    {{ __('Contact me') }}
                </x-web::button>
            </div>
        </div>
    </div>
</section>
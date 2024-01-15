<section {{ $attributes->merge(['class' => 'hero min-h-92-screen bg-image-1'])}}>
    <div class="hero-overlay bg-primary bg-opacity-70"></div>
    <div class="hero-content flex-col lg:flex-row text-neutral-content">
        <div class="avatar">
            <div class="w-48 rounded-full">
                <img src="{{ Vite::asset('resources/web/images/2.webp') }}" />

            </div>

        </div>
        <div>
            <h1 class="text-5xl font-bold">
                {{ __("Hello I'm Andres Lopez!") }}
            </h1>
            <p class="py-6 flex gap-3">
                {{ __("LET'S CONNECT") }}
                <x-feathericon-chevron-right class="text-accent" />
                <a rel="noopener noreferrer" target="_blank" href="https://instagram.com/andres.lqr" class="hover:text-info hover:cursor-pointer">
                    <x-feathericon-instagram />
                </a>
                <a rel="noopener noreferrer" target="_blank" href="https://linkedin.com/in/andresdevr" class="hover:text-info hover:cursor-pointer">
                    <x-feathericon-linkedin />
                </a>
                <a href="{{ route('contact') }}" class="hover:text-info hover:cursor-pointer">
                    <x-feathericon-mail />
                </a>
            </p>
            <small class="py-6">
                {{ __("...or keep scrolling it's free.") }}
            </small>
        </div>
    </div>
</section>
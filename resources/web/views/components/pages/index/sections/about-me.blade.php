<section {{ $attributes->merge(['class' => 'hero min-h-92-screen bg-gradient-to-br from-base-100 to-primary']) }}>
    <div class="hero-content flex-col lg:flex-row-reverse">
        <img src="{{ Vite::asset('resources/web/images/3.webp') }}"
            alt="{{ __('image of :description', ['description' => __('')]) }}"
            class="max-w-sm lg:max-w-md rounded-lg shadow-2xl hidden md:block" />
        <div class="max-w-xs sm:max-w-sm md:max-w-lg lg:max-w-xl">
            <div class="mockup-browser bg-base-300 border border-base-300">
                <div class="mockup-browser-toolbar">
                    <div class="input border border-base-300">
                        {{ config('app.url') }}
                    </div>
                </div>
                <div class="bg-base-100 px-4 py-16 border-t border-base-300">

                    <h2 class="text-4xl font-bold text-center lg:text-start text-secondary">
                        {{ __('About me') }}
                    </h2>

                    <p class="py-6 text-start">
                        {{ __("I'm a passionate about the software and the research of innovative and scalable solutions, with experience in Agile methodologies and team leadership.") }}
                    </p>
                    <div class="flex gap-3 justify-center lg:justify-start">
                        <x-web::button class="btn-primary" as-link href="{{ route('contact') }}">
                            {{ __('Contact me') }}
                        </x-web::button>
                        <x-web::button class="btn-primary-content" as-link outline href="{{ route('online-cv') }}">
                            {{ __('Read my CV') }}
                        </x-web::button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section {{ $attributes->merge(['class' => 'hero min-h-screen bg-base-200']) }}>
    <div class="hero-content flex-col lg:flex-row-reverse">
        <img src="{{ Vite::asset('resources/web/images/3.webp') }}"
            alt="{{ __('image of :description', ['description' => __('')]) }}"
            class="max-w-sm lg:max-w-md rounded-lg shadow-2xl hidden md:block" />
        <div class="max-w-xl">
            <h2 class="text-5xl font-bold text-center lg:text-start">
                {{ __('About me') }}
            </h2>
            <p class="py-6 text-center lg:text-start">
                {{ __("I'm a passionate about the software and the research of innovative and scalable solutions, with experience in Agile methodologies and team leadership.") }}
            </p>
            <div class="flex gap-3 justify-center lg:justify-start">
                <x-web::button class="btn-primary" as-link href="{{ route('contact') }}">
                    {{ __('Contact me') }}
                </x-web::button>
                <x-web::button class="btn-primary" as-link outline href="{{ route('online-cv') }}">
                    {{__('Read my CV') }}
                </x-web::button>
            </div>
        </div>
    </div>
</section>
<footer class="footer items-center place-items-center md:place-items-start p-4 bg-neutral text-neutral-content">
    <aside class="items-center  grid-flow-col">
        <p class="w-full">© {{ __('Copyright') }} {{ now()->year }} - {{ __('All right reserved') }}, {{ __('Andres Lopez')  }}.</p>
    </aside>
    <nav class="grid-flow-col gap-4 md:place-self-center md:justify-self-end">
        <a rel="noopener noreferrer" target="_blank" href="https://instagram.com/andres.lqr" class="hover:text-info hover:cursor-pointer">
            <x-feathericon-instagram />
        </a>
        <a rel="noopener noreferrer" target="_blank" href="https://linkedin.com/in/andresdevr" class="hover:text-info hover:cursor-pointer">
            <x-feathericon-linkedin />
        </a>
        <a href="{{ route('contact') }}" class="hover:text-info hover:cursor-pointer">
            <x-feathericon-mail />
        </a>
    </nav>
</footer>

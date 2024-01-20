<div class="w-full flex justify-center">
    @if($paginator->hasPages())
        <nav class="join" x-data>
                <x-web::button outline x-scroll-into="{{ $scrollTo }}" class="join-item min-w-32" wire:click="previousPage" :disabled="$paginator->onFirstPage()" wire:loading.attr="disabled" rel="prev">
                    {{ __('Previous') }}
                </x-web::button>
                <x-web::dropdown class="dropdown-top">
                    <x-slot:trigger class="rounded-none btn-outline">
                        <span class="loading loading-ring loading-md hidden" wire:loading.class.remove="hidden"></span>
                        <span wire:loading.class="hidden">
                            {{ $paginator->currentPage() }}
                        </span>
                    </x-slot:trigger>
                    <x-slot:content class="-translate-x-1/2 left-1/2">
                        @unless ($paginator->onFirstPage())
                            @foreach (range($paginator->currentPage() > 2 ? $paginator->currentPage() - 2 : 1, $paginator->currentPage() - 1) as $page)
                                <x-web::menu.item class="flex justify-center" wire:key="page-{{ $page }}" wire:click="gotoPage({{ $page }})" x-scroll-into="{{ $scrollTo }}" @click="close">
                                    {{ $page }}
                                </x-web::menu.item> 
                            @endforeach
                        @endunless
                        <x-web::menu.item class="flex justify-center" wire:key="page-{{ $paginator->currentPage() }}" disabled>
                            {{ $paginator->currentPage() }}
                        </x-web::menu.item>
                        @unless ($paginator->onLastPage())
                            @foreach (range($paginator->currentPage() + 1, $paginator->currentPage() < $paginator->lastPage() - 1 ? $paginator->currentPage() + 2 : $paginator->lastPage()) as $page)
                                <x-web::menu.item class="flex justify-center" wire:key="page-{{ $page }}" wire:click="gotoPage({{ $page }})" x-scroll-into="{{ $scrollTo }}" @click="close">
                                    {{ $page }}
                                </x-web::menu.item> 
                            @endforeach
                        @endunless
                    </x-slot:content>
                </x-web::dropdown>
                <x-web::button outline x-scroll-into="{{ $scrollTo }}" class="join-item min-w-32" wire:click="nextPage" :disabled="$paginator->onLastPage()" wire:loading.attr="disabled" rel="next">
                    {{ __('Next') }}
                </x-web::button>
        </nav>
    @endif
</div>



<{{ $data['level'] }} class="{{  match ($data['level']) {
    'h1' => 'text-4xl sm:text-5xl md:text-6xl font-bold',
    'h2' => 'text-2xl sm:text-3xl md:text-4xl font-bold',
    'h3' => 'text-xl sm:text-2xl md:text-3xl font-bold',
    'h4' => 'text-2xl sm:text-3xl md:text-4xl',
    'h5' => 'text-lg sm:text-xl md:text-2xl font-bold',
    'h6' => 'text-lg sm:text-xl md:text-2xl',
    default => 'text-xl font-bold'
}  }}">
    {{ $data['content'] }}
</{{ $data['level'] }}>
@props([
    'asLink' => false,
    'outline' => false
]) 

<{{ $asLink ? 'a' : 'button'}} {{ $attributes->merge(['class' => 'btn', 'type' => ! $asLink ? 'button' : ''])->class(['btn-outline' => $outline]) }}>
    {{ $slot }}   
</{{ $asLink ? 'a' : 'button'}}>
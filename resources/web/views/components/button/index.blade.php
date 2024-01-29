@props([
    'asLink' => false,
    'outline' => false,
    'external' => false
]) 

<{{ $asLink ? 'a' : 'button'}} {{ $attributes->merge(['class' => 'btn', 'type' => ! $asLink ? 'button' : '', 'rel' => $external ? 'noopener noreferrer' : false, 'target' => $external ? '_blank' : false])->class(['btn-outline' => $outline]) }}>
    {{ $slot }}   
</{{ $asLink ? 'a' : 'button'}}>
@props([

])

<li>
    @isset($start)
        <div {{ $start->attributes->merge(['class' => 'timeline-start']) }}>
            {{ $start }}
        </div>
    @endisset
    @isset($middle)
        <div {{ $middle->attributes->merge(['class' => 'timeline-middle']) }}>
            {{ $middle }}
        </div>
    @endisset
    @isset($end)
        <div {{ $end->attributes->merge(['class' => 'timeline-end']) }}>
            {{ $end }}
        </div>
    @endisset
    <hr />
</li>
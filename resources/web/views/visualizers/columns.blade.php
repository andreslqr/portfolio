<div class="grid grid-cols-1 md:grid-cols-{{ count($data) }} gap-4">
    @foreach($data as $column)
        <div class="col-span-1">
            @foreach ($column as $dataColumn)
                {{ $webContentRender->getBlockView($dataColumn) }}
            @endforeach
        </div>
    @endforeach
</div>
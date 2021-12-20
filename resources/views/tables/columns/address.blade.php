<div>
    {{ $getState()['address_1'] }}, {{ $getState()['number'] }}
    @empty( !$getState()['complement'] )
        - {{ $getState()['complement'] }}
    @endempty
    <br>
    {{ $getState()['address_2'] }} <br>
    {{ $getState()['city'] }} - {{ $getState()['state'] }}
</div>

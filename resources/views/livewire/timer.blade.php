@php
    date_default_timezone_set('America/Santo_Domingo');
@endphp

<div>
    <div wire:poll.1ms>
        <h2><b>Hora: {{ date("h:i:s a") }}</b></h2>
    </div>
</div>

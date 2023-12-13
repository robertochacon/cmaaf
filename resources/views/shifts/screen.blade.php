@include('share/header')

<style>
    .centro{
        height: 90vh;
        display: flex;
        justify-items: center;
        align-items: center
    }
</style>

@livewireStyles

<nav class="navbar navbar-white bg-white" style="height: 10vh;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <img src="{{ asset('images/logo.png') }}" alt="" width="200"  class="d-inline-block align-text-top">
        </a>
    </div>
</nav>


<div class="row justify-content-center centro p-0 m-0">

    <div class="col-12 p-2 text-center">
        <div class="row justify-content-between align-items-center">
            <div class="col-6 text-start">
                <h1 class="text-success"><b>Lista de turnos</b></h1>
            </div>
        </div>
    </div>

    <div class="col-6 row justify-content-center" wire:poll.1s>

        <div class="row justify-content-around p-2">

            @foreach ($shifts as $shift)
            <div class="col-8 mt-2">
                <button type="submit" class="container border-0 p-3 rounded shadow bg-primary text-center text-white">
                    <h1><b>{{ $shift['code'] }}</b></h1>
                </button>
            </div>
            <div class="col-4 mt-2">
                <h1><b>{{ $shift['window'] ?? 'N/A' }}</b></h1>
            </div>
            @endforeach

        </div>

    </div>

    <div class="col-6 row justify-content-center" wire:poll.1s>
        <h1>
            <div wire:poll.10000ms>
                Current time: {{ now() }}
            </div>
        </h1>
    </div>

</div>

@livewireScripts

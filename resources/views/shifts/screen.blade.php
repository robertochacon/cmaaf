@include('share/header')

<style>
    .centro{
        height: 90vh;
        display: flex;
        justify-items: center;
        align-items: center
    }
</style>

<div class="row justify-content-center centro p-0 m-0">

    <div class="col-12">
        <nav class="navbar navbar-white bg-white">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="" width="200"  class="d-inline-block align-text-top">
                </a>
            </div>
        </nav>
    </div>

    <div class="col-12 pb-0 p-4 text-center">
        <div class="row justify-content-between align-items-center">
            <div class="col-6 text-start">
                <h4 class="text-secondary"><b>Sala {{ $room }}</b></h4>
                <h1 class="text-success"><b>Lista de turnos</b></h1>
            </div>
            <div class="col-6 text-end">
                @livewire('timer')
            </div>
        </div>
    </div>

    <div class="col-6 row justify-content-center">

        @livewire('shifts')

    </div>

    <div class="col-6 row justify-content-center">


        <iframe width="560" height="515" src="https://www.youtube.com/embed/oTXbu7EKqQA?si=_tb3COc0AQMViMxa?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;" allowfullscreen></iframe>


    </div>

</div>

@livewireScripts

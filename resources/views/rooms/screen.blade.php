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
            <div class="col-12 text-center">
                <h1 class="text-success"><b>Salas disponibles</b></h1>
            </div>
        </div>
    </div>

    <div class="row justify-content-around">

        @foreach ($rooms as $room)
            <div class="col-4 p-2">
                <a href="{{ url('sala/'.$room['name']) }}" type="submit" style="text-decoration: none" class="container border-0 p-3 rounded shadow bg-secondary text-center text-white">
                    <h1><b>{{ $room['name'] }}</b></h1>
                </a>
            </div>
        @endforeach

    </div>

</div>


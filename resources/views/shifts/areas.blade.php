@include('share/header')

<style>
    .centro{
        height: 90vh;
        display: flex;
        justify-items: center;
        align-items: center;
        background:rgba(255, 255, 255, 0.9);
    }
    .fondo{
        background-image: url('{{ asset('images/bg/fondo-screen.jpg') }}');
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<div class="p-5 fondo">

    <div class="p-0 m-0 shadow rounded">

        <div class="row justify-content-center centro">

            <div class="col-10 row justify-content-center">

                <div class="col-12">
                    <nav class="navbar navbar-white">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="#">
                            <img src="{{ asset('images/logo.png') }}" alt="" width="300"  class="d-inline-block align-text-top">
                            </a>
                        </div>
                    </nav>
                </div>

                <div class="row justify-content-around p-5">

                    <div class="col-12 p-3 text-start">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-6 text-start">
                                <h1 class="text-success"><b>Hacia donde se dirige?</b></h1>
                            </div>
                            <div class="col-4 p-3 text-end">
                                <a href="{{ url('turnos') }}" type="submit" class="container border-0 rounded shadow bg-secondary text-center text-white" style="text-decoration: none;">
                                    <h1>Atras</h1>
                                </a>
                            </div>
                        </div>
                    </div>

                    @foreach ($areas as $area)
                    <div class="col-6 mt-2" style="cursor:pointer;">
                        <form action="{{ url('turnos/solicitado') }}" method="GET">
                        @csrf
                            <button type="submit" class="container border-0 p-3 rounded shadow bg-primary text-center text-white">
                                <h1><b>{{ $area['name'] }}</b></h1>
                            </button>
                            <input type="hidden" name="area" value="{{ $area['name'] }}">
                            <input type="hidden" name="acronym" value="{{ $area['acronym'] }}">
                            <input type="hidden" id="cedulaResult" name="identification" value="{{ $identification }}">
                        </form>
                    </div>
                    @endforeach

                </div>

        </div>

    </div>

</div>

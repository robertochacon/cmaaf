@include('share/header')

<div class="container">
    <div class="row justify-content-center">

        <div class="col-10 mt-5 p-5 shadow rounded text-white text-center">
            <img src="{{ asset('images/logo.png') }}" alt="" width="300"  class="d-inline-block align-text-top">
        </div>

        <div class="col-10">
            <a href="admin/login" style="text-decoration: none;">
                <div class="p-3 shadow rounded text-white text-center mt-5 bg-primary">
                    <h1>Acceso al sistema</h1>
                </div>
            </a>
        </div>
        <div class="col-10">
            <a href="salas" style="text-decoration: none;">
                <div class="p-3 shadow rounded text-white text-center mt-3 bg-primary">
                    <h1>Pantallas de turnos</h1>
                </div>
            </a>
        </div>
        <div class="col-10">
            <a href="turnos" style="text-decoration: none;">
                <div class="p-3 shadow rounded text-white text-center mt-3 bg-primary">
                    <h1>Dispensador de turno</h1>
                </div>
            </a>
        </div>
    </div>
</div>

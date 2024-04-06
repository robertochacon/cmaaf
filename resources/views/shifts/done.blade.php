@include('share/header')

<style>
    .centro{
        height: 90vh;
        display: flex;
        justify-items: center;
        align-items: center
    }
    @media print {
        .no-print {
            display: none;
        }
        #print {
            display: block !important;
        }
    }

    /* @media screen {
        #print {
            display: none;
        }
    } */
</style>

<div class="col-12 no-print">

    <nav class="navbar navbar-white bg-white" style="height: 10vh;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="{{ asset('images/logo.png') }}" alt="" width="300"  class="d-inline-block align-text-top">
            </a>
        </div>
    </nav>

    <div class="row justify-content-center centro">
        <div class="col-12 text-center">
            <div class="col-12 text-center">
                <h1>
                    Codigo<br>
                    <b>{{ $shift['code'] }}</b>
                </h1>
            </div>
            <div class="col-12 mt-5 text-center text-success">
                <h2>
                    Favor tomar su ticket!
                </h2>
                <a href="{{ url('turnos') }}" type="submit" class="btn btn-secondary border-0 rounded shadow text-center text-white" style="text-decoration: none;">
                    <h1>Atras</h1>
                </a>
            </div>
        </div>
    </div>

</div>

{{-- Template a imprimir --}}
<div class="row justify-content-center centro" id="print">
    <center>
        <br>
        <img src="{{ asset('images/logo.png') }}" alt="" width="200"  class="d-inline-block align-text-top">
        <br>
        <br>
        <h3>Bienvenido(a)</h3>
        <hr>
        <h1><b>Turno<br>{{ $shift['code'] }}</b></h1>
        <hr>
        <h3>Servicio: {{ $shift['area'] }}</h3>
        <h3>Tiempo promedio de atención 1 minutos</h3>
        <p><b>Fecha:</b> {{ $date['date'] }} <b>Hora:</b> {{ $date['hour'] }}</p>
        <p></p>
    </center>
</div>

<script>

    window.focus();
    setTimeout(() => {

        window.print();
        setTimeout(() => {
            window.location.href = '/turnos';
        }, 1000);

    }, 1000);

</script>

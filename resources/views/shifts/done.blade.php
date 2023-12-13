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
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center centro" id="print">
    <center>
        <h1>TICKET<br><b>{{ $shift['code'] }}</b></h1>
        <br>
        <p>Fecha: {{ $date['date'] }}</p>
        <p>Hora: {{ $date['hour'] }}</p>
    </center>
</div>

{{-- <script>

    window.focus();
    setTimeout(() => {
        window.print();
        setTimeout(() => {
            window.location.hostname = '/request';
        }, 3000);
    }, 1000);

</script> --}}

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
        background-position:fixed;
    }
    .inputCedula{
        background:gainsboro;
        border:none;
        font-size: 50px;
    }
    .inputCedula:focus{
        background:gainsboro;
        border:none !important;
        box-shadow: none;
    }

    .step{
        display: none;
    }

    /*impresion*/
    @media print {
        .no-print {
            display: none !important;
        }
        #print {
            display: block !important;
        }
    }

    @media screen {
        #print {
            display: none;
        }
    }
</style>

<div class="p-5 fondo no-print" id="screen-1">

    <div class="p-0 m-0 shadow">

        <div class="row justify-content-center centro rounded">

            <div class="col-10 row justify-content-center" id="first-form">

                <div class="col-12" style="top:0%;">
                    <nav class="navbar navbar-white">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="#">
                            <img src="{{ asset('images/logo.png') }}" alt="" width="300"  class="d-inline-block align-text-top">
                            </a>
                        </div>
                    </nav>
                </div>

                <form action="{{ url('turnos/solicitado') }}" method="GET" id="request_turn">
                    @csrf

                    <div class="step" id="step-1">

                        <div class="col-12">
                            {{-- <hr>
                            <h1 style="font-size:80px;" class="text-success"><b>Introduzca su cédula</b></h1> --}}
                            <hr>
                            <input type="text" name="identification" class="form-control p-2 text-end inputCedula" id="cedula" placeholder="Introduzca su cédula">
                            <br>
                        </div>

                        <div class="row pt-0">
                            <div class="col-9">
                                <div class="row justify-content-around mt-1">
                                    <div class="col-4" onclick="add(1)" style="cursor:pointer;">
                                        <div class="container p-1 rounded shadow bg-secondary text-center text-white">
                                            <h1 style="font-size:60px;"><b>1</b></h1>
                                        </div>
                                    </div>
                                    <div class="col-4" onclick="add(2)" style="cursor:pointer;">
                                        <div class="container p-1 rounded shadow bg-secondary text-center text-white">
                                            <h1 style="font-size:60px;"><b>2</b></h1>
                                        </div>
                                    </div>
                                    <div class="col-4" onclick="add(3)" style="cursor:pointer;">
                                        <div class="container p-1 rounded shadow bg-secondary text-center text-white">
                                            <h1 style="font-size:60px;"><b>3</b></h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-around mt-1">
                                    <div class="col-4" onclick="add(4)" style="cursor:pointer;">
                                        <div class="container p-1 rounded shadow bg-secondary text-center text-white">
                                            <h1 style="font-size:60px;"><b>4</b></h1>
                                        </div>
                                    </div>
                                    <div class="col-4" onclick="add(5)" style="cursor:pointer;">
                                        <div class="container p-1 rounded shadow bg-secondary text-center text-white">
                                            <h1 style="font-size:60px;"><b>5</b></h1>
                                        </div>
                                    </div>
                                    <div class="col-4" onclick="add(6)" style="cursor:pointer;">
                                        <div class="container p-1 rounded shadow bg-secondary text-center text-white">
                                            <h1 style="font-size:60px;"><b>6</b></h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-around mt-1">
                                    <div class="col-4" onclick="add(7)" style="cursor:pointer;">
                                        <div class="container p-1 rounded shadow bg-secondary text-center text-white">
                                            <h1 style="font-size:60px;"><b>7</b></h1>
                                        </div>
                                    </div>
                                    <div class="col-4" onclick="add(8)" style="cursor:pointer;">
                                        <div class="container p-1 rounded shadow bg-secondary text-center text-white">
                                            <h1 style="font-size:60px;"><b>8</b></h1>
                                        </div>
                                    </div>
                                    <div class="col-4" onclick="add(9)" style="cursor:pointer;">
                                        <div class="container p-1 rounded shadow bg-secondary text-center text-white">
                                            <h1 style="font-size:60px;"><b>9</b></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="col-12" onclick="add(0)" style="cursor:pointer;">
                                    <div class="container p-1 mt-1 rounded shadow bg-secondary text-center text-white">
                                        <h1 style="font-size:60px;"><b>0</b></h1>
                                    </div>
                                </div>
                                <div class="col-12" onclick="removeN()" style="cursor:pointer;">
                                    <button type="button" class="container p-3 mt-1 rounded shadow bg-danger text-center text-white border-0">
                                        <h1 style="font-size:40px;">Borrar</h1>
                                    </button>
                                </div>
                                <div class="col-12" style="cursor:pointer;">
                                    <button type="button" onclick="displayStep(2,1)" class="container p-3 mt-1 rounded shadow bg-success text-center text-white border-0">
                                        <h1 style="font-size:40px;">Siguiente</h1>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="step" id="step-2">
                        <hr>
                        <div class="col-12 pt-0 text-start">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-12 text-start">
                                    <h1 class="text-success" style="font-size:60px;"><b>Seleccione una opción</b></h1>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row justify-content-around">
                            <div class="col-6 mt-2 text-center">

                                <input type="radio" id="asegurado" name="insurance" value="true" hidden />
                                <label for="asegurado" style="width: 100%;">
                                    <span type="button" onclick="displayStep(3,2)" class="container p-3 mt-1 rounded shadow bg-primary text-center text-white border-0">
                                        <h1 style="font-size:60px;">Asegurado</h1>
                                    </span>
                                </label>

                            </div>
                            <div class="col-6 mt-2 text-center">

                                <input type="radio" id="noasegurado" name="insurance" value="false" hidden />
                                <label for="noasegurado" style="width: 100%;">
                                    <span type="button" onclick="displayStep(3,2)" class="container p-3 mt-1 rounded shadow bg-primary text-center text-white border-0">
                                        <h1 style="font-size:60px;">No asegurado</h1>
                                    </span>
                                </label>

                            </div>
                        </div>

                        <hr>
                        <div class="row justify-content-around">
                            <div class="col-5">
                                <button type="button" onclick="displayStep(1,2)" class="container p-1 mt-1 rounded shadow bg-secondary text-center text-white border-0">
                                    <h1 style="font-size:60px;">Volver</h1>
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="step" id="step-3">
                        <div class="row justify-content-around">

                            <hr>
                            <div class="col-12 pt-0 text-start">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-12 text-start">
                                        <h1 style="font-size:60px;" class="text-success"><b>Seleccione la opción deseada</b></h1>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            @foreach ($areas as $area)
                            <div class="col-6 mt-2" style="cursor:pointer;">

                                    <button type="button" class="container border-0 p-3 rounded shadow bg-primary text-center text-white" onclick="setArea('{{ $area['name'] }}','{{ $area['acronym'] }}')">
                                        <h1 style="font-size:60px;"><b>{{ $area['name'] }}</b></h1>
                                    </button>

                            </div>
                            @endforeach

                            <input type="hidden" name="area" id="area">
                            <input type="hidden" name="acronym" id="acronym">

                        </div>

                        <hr>
                        <div class="row justify-content-around">
                            <div class="col-6 text-center">

                                <button type="button" onclick="displayStep(2,3)" class="container p-1 mt-1 rounded shadow bg-secondary text-center text-white border-0">
                                    <h1>Volver</h1>
                                </button>

                            </div>
                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<div class="col-12 no-print" id="screen-2">

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
                    <b id="code-detail-print"></b>
                </h1>
            </div>
            <div class="col-12 mt-5 text-center text-success">
                <h2>
                    Favor tomar su ticket!
                </h2>
                <a type="submit" class="btn btn-secondary border-0 rounded shadow text-center text-white" style="text-decoration: none;">
                    <h1>Atras</h1>
                </a>
            </div>
        </div>
    </div>

</div>

{{-- Template a imprimir --}}
<div class="row justify-content-center centro" id="print">
    <center>
        <img src="{{ asset('images/logo.png') }}" alt="" width="200"  class="d-inline-block align-text-top">
        <br>
        <br>
        <h3>Bienvenido(a)</h3>
        <hr>
        <h1><b>Turno<br><p id="code-print"></p></b></h1>
        <hr>
        <h3>Servicio: <p id="area-print"></p></h3>
        {{-- <h3>Tiempo promedio de atención 1 minutos</h3> --}}
        <p><b>Fecha:</b> <p id="date-print"></p> <b>Hora:</b> <p id="hour-print"></p></p>
        <p></p>
    </center>
</div>

<script src="{{ asset('js/imask/imask.js') }}"></script>
<script src="{{ asset('js/jquery/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2/sweetalert2@11.js') }}"></script>
<script>

    const cedulaElement = document.getElementById('cedula');
    const maskOptions = {
        mask: '000-0000000-0'
    };
    const mask = IMask(cedulaElement, maskOptions);

    function add(n){
        let cedula = document.getElementById('cedula').value;
        cedulaElement.focus();
        let result = cedula+n;

        if (cedula.length<=11) {
            document.getElementById('cedula').value = result;
            document.getElementById('cedulaResult').value = result;
        }
    }

    function removeN(){
        let cedula = document.getElementById('cedula').value;
        document.getElementById('cedula').value = cedula.substr(0, cedula.length - 1);
        cedulaElement.focus();
    }

    function displayStep(show, hide){
        document.getElementById('step-'+show).style.display='block';
        document.getElementById('step-'+hide).style.display='none';
    }

    displayStep(1,2);

    function displayScreen(show, hide){
        document.getElementById('screen-'+show).style.display='block';
        document.getElementById('screen-'+hide).style.display='none';
    }

    displayScreen(1,2);

    function setArea(name, acronym) {
        const nameField = document.getElementById('area');
        const acronymField = document.getElementById('acronym');

        if (nameField && acronymField) {
            nameField.value = name;
            acronymField.value = acronym;
            setTimeout(() => {
                // document.getElementById('request_turn').submit();
                save();
            }, 500);
        }
    }

    function save(){
        $.ajax({
            url: "{{ url('api/shift/save') }}",
            type: 'POST',
            data: $('#request_turn').serialize(),
            beforeSend: function() {
                Swal.fire({
                    icon: 'info',
                    title: 'Procesando...',
                    showConfirmButton: false,
                    timer: 1000
                })
            },
            success: function(res) {

                $('#code-detail-print').html(res.shift.code);
                $('#code-print').html(res.shift.code);
                $('#area-print').html(res.shift.area);
                $('#date-print').html(res.date.date);
                $('#hour-print').html(res.date.hour);

                $('#request_turn').get(0).reset();
                displayScreen(2,1);

                setTimeout(() => {
                    window.print();
                    setTimeout(() => {
                        displayStep(1,2);
                        displayStep(1,3);
                        displayScreen(1,2);
                    }, 1000);
                }, 1000);

            },
            error: function(xhr, status, error) {

                Swal.fire({
                    icon: 'error',
                    title: "Intente mas tarde",
                    showConfirmButton: false,
                    timer: 1500
                })

                setTimeout(() => {
                    displayStep(1,2);
                    displayStep(1,3);
                    displayScreen(1,2);
                }, 1000);
            }
        });
    }

</script>

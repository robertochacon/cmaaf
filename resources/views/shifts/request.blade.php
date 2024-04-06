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

</style>

<div class="p-5 fondo">

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

                <form action="{{ url('turnos/solicitado') }}" method="GET">
                @csrf

                <div class="step" id="step-1">
                    <hr>
                    <div class="col-12 pb-2 p-5">
                        <h1 class="text-success"><b>Introduzca su cédula</b></h1>
                        <input type="text" name="identification" class="form-control p-2 text-end inputCedula" id="cedula">
                    </div>

                    <div class="row pt-0 p-5">
                        <div class="col-9">
                            <div class="row justify-content-around mt-1">
                                <div class="col-4" onclick="add(1)" style="cursor:pointer;">
                                    <div class="container p-1 rounded shadow bg-secondary text-center text-white">
                                        <h1><b>1</b></h1>
                                    </div>
                                </div>
                                <div class="col-4" onclick="add(2)" style="cursor:pointer;">
                                    <div class="container p-1 rounded shadow bg-secondary text-center text-white">
                                        <h1><b>2</b></h1>
                                    </div>
                                </div>
                                <div class="col-4" onclick="add(3)" style="cursor:pointer;">
                                    <div class="container p-1 rounded shadow bg-secondary text-center text-white">
                                        <h1><b>3</b></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-around mt-1">
                                <div class="col-4" onclick="add(4)" style="cursor:pointer;">
                                    <div class="container p-1 rounded shadow bg-secondary text-center text-white">
                                        <h1><b>4</b></h1>
                                    </div>
                                </div>
                                <div class="col-4" onclick="add(5)" style="cursor:pointer;">
                                    <div class="container p-1 rounded shadow bg-secondary text-center text-white">
                                        <h1><b>5</b></h1>
                                    </div>
                                </div>
                                <div class="col-4" onclick="add(6)" style="cursor:pointer;">
                                    <div class="container p-1 rounded shadow bg-secondary text-center text-white">
                                        <h1><b>6</b></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-around mt-1">
                                <div class="col-4" onclick="add(7)" style="cursor:pointer;">
                                    <div class="container p-1 rounded shadow bg-secondary text-center text-white">
                                        <h1><b>7</b></h1>
                                    </div>
                                </div>
                                <div class="col-4" onclick="add(8)" style="cursor:pointer;">
                                    <div class="container p-1 rounded shadow bg-secondary text-center text-white">
                                        <h1><b>8</b></h1>
                                    </div>
                                </div>
                                <div class="col-4" onclick="add(9)" style="cursor:pointer;">
                                    <div class="container p-1 rounded shadow bg-secondary text-center text-white">
                                        <h1><b>9</b></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="col-12" onclick="add(0)" style="cursor:pointer;">
                                <div class="container p-1 mt-1 rounded shadow bg-secondary text-center text-white">
                                    <h1><b>0</b></h1>
                                </div>
                            </div>
                            <div class="col-12" onclick="removeN()" style="cursor:pointer;">
                                <div class="container p-1 mt-1 rounded shadow bg-danger text-center text-white">
                                    <h1>Borrar</h1>
                                </div>
                            </div>
                            <div class="col-12" style="cursor:pointer;">
                                <button type="button" onclick="displayStep(2,1)" class="container p-1 mt-1 rounded shadow bg-success text-center text-white border-0">
                                    <h1>Siguiente</h1>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="step" id="step-2">
                    <hr>
                    <div class="row justify-content-around">
                        <div class="col-6 text-center">

                            <input type="radio" id="asegurado" name="insurance" value="true" hidden />
                            <label for="asegurado">
                                <span type="button" onclick="displayStep(3,2)" class="container p-3 mt-1 rounded shadow bg-success text-center text-white border-0">
                                    <h1>Asegurado</h1>
                                </span>
                            </label>

                        </div>
                        <div class="col-6 text-center">

                            <input type="radio" id="noasegurado" name="insurance" value="false" hidden />
                            <label for="noasegurado">
                                <span type="button" onclick="displayStep(3,2)" class="container p-3 mt-1 rounded shadow bg-success text-center text-white border-0">
                                    <h1>No asegurado</h1>
                                </span>
                            </label>

                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-around">
                        <div class="col-5">
                            <button type="button" onclick="displayStep(1,2)" class="container p-1 mt-1 rounded shadow bg-secondary text-center text-white border-0">
                                <h1>Volver</h1>
                            </button>
                        </div>
                    </div>

                </div>

                <div class="step" id="step-3">
                    <hr>
                    <div class="row justify-content-around p-5">

                        <div class="col-12 p-3 pt-0 text-start">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-8 text-start">
                                    <h1 class="text-success"><b>Seleccione la opción deseada</b></h1>
                                </div>
                            </div>
                        </div>

                        @foreach ($areas as $area)
                        <div class="col-6 mt-2" style="cursor:pointer;">

                                <button type="submit" class="container border-0 p-3 rounded shadow bg-primary text-center text-white">
                                    <h1><b>{{ $area['name'] }}</b></h1>
                                </button>
                                <input type="hidden" name="area" value="{{ $area['name'] }}">
                                <input type="hidden" name="acronym" value="{{ $area['acronym'] }}">

                        </div>
                        @endforeach

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

<script src="{{ asset('js/imask/imask.js') }}"></script>
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


</script>

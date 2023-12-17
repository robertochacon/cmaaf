@include('share/header')

<style>
    .centro{
        height: 90vh;
        display: flex;
        justify-items: center;
        align-items: center
    }
</style>

<nav class="navbar navbar-white bg-white" style="height: 10vh;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <img src="{{ asset('images/logo.png') }}" alt="" width="300"  class="d-inline-block align-text-top">
        </a>
    </div>
</nav>

    <div class="row justify-content-center centro">

        <div class="col-10 row justify-content-center" id="first-form">

            <form action="{{ route('turnos/areas') }}" method="get">
                @csrf

                <div class="col-12 pb-2 p-5">
                    <h1 class="text-success"><b>Introduzca su cedula</b></h1>
                    <input type="text" name="identification" class="form-control p-2 text-end size-50" id="cedula" style="font-size: 50px;">
                </div>

            </form>

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
                    <div class="col-12" onclick="next()" style="cursor:pointer;">
                        <div class="container p-1 mt-1 rounded shadow bg-success text-center text-white">
                            <h1>Siguiente</h1>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
<script src="{{ asset('js/imask/imask.js') }}"></script>
<script>

    const cedulaElement = document.getElementById('cedula');
    const maskOptions = {
        mask: '000-000000-0'
    };
    const mask = IMask(cedulaElement, maskOptions);

    function add(n){
        let cedula = document.getElementById('cedula').value;
        let result = cedula+n;

        if (cedula.length<=10) {
            document.getElementById('cedula').value = result;
            cedulaElement.focus();
            document.getElementById('cedulaResult').value = result;
        }
    }

    function removeN(){
        let cedula = document.getElementById('cedula').value;
        document.getElementById('cedula').value = cedula.substr(0, cedula.length - 1);
        cedulaElement.focus();
    }

</script>

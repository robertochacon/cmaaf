@include('share/header')

<style>
    .centro{
        height: 90vh;
        /* display: flex;
        justify-items: center;
        align-items: center; */
        background:rgba(255, 255, 255, 0.9);
    }
    .fondo{
        background-image: url('{{ asset('images/bg/fondo-screen.jpg') }}');
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<div class="p-5 fondo">

    <div class="row justify-content-center centro p-0 m-0 shadow rounded">

        <div class="col-12">
            <nav class="navbar navbar-white">
                <div class="container-fluid">
                    <a class="navbar-brand bg-white rounded" href="/salas">
                    <img src="{{ asset('images/logo.png') }}" alt="" width="200"  class="d-inline-block align-text-top">
                    </a>
                </div>
            </nav>
            <div class="col-12 pb-0 p-4 text-center">
                <div class="row justify-content-between align-items-center">
                    <div class="col-6 text-start">
                        <h2 class="text-secondary"><b>{{ $room }}</b></h2>
                        <h1 class="text-success"><b>Lista de turnos</b></h1>
                    </div>
                    <div class="col-6 text-end">
                        @livewire('timer')
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 row justify-content-center">

            <livewire:broadcasting/>

            @livewire('shifts', ['room' => $room, 'areas' => $areas])

        </div>

        <div class="col-6 p-3 row justify-content-center">

            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner rounded shadow">

                    @if(isset($images))

                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ URL::to('/storage/'.$images[0]) }}" alt="Imagen">
                        </div>

                        @foreach($images as $image)
                            @if($image != $images[0])
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ URL::to('/storage/'.$image) }}" alt="Imagen">
                            </div>
                            @endIf
                        @endforeach

                    @else

                            <center>
                                <h1 class="text-primary" style="font-size: 100px"><b>Bienvenidos</b></h1>
                                <h1 class="text-secondary">Favor estar pendiente a su turno</h1>
                            </center>

                    @endIf

                </div>
              </div>

        </div>

    </div>

    <div class="modal fade" id="llamada-turno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-body">
                <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h1><b>Turno</b></h1>
                    <h1 id="nshift">LAB-4</h1>
                    <h1><b>Posición</b></h1>
                    <h1 id="nposition">4</h1>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>

</div>

<script src="{{ asset('js/jquery/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>

@livewireScripts

<script>

    $(document).ready(function(){
        $('.carousel').carousel();
        conexionEvent();
        setInterval(() => {
            conexionEvent();
        }, 500000);
    });

    const audio = new Audio("{{ asset('song/turno.mp3') }}");
    let isProcessingEvent = false; // Flag to prevent multiple executions

    function conexionEvent(){
        if (isProcessingEvent) return; // If already processing, exit function

        isProcessingEvent = true; // Set flag to true to prevent re-entry

        try {
            window.addEventListener('call-shift', event => {

                let patient_name = event.detail[0].shift.patient_name;
                let room = event.detail[0].shift.room;
                let code = event.detail[0].shift.code;
                let position = event.detail[0].shift.position;

                $("#nshift").html(code);
                $("#nposition").html(position);

                if (room === '{{ $room }}') {
                    setTimeout(() => {

                        //open modal
                        $("#llamada-turno").modal('show');

                        //call turn
                        voicePatient(code, position);

                        //close modal
                        setTimeout(() => {
                            $("#llamada-turno").modal('hide');
                            isProcessingEvent = false; // Reset flag after processing
                        }, 5000);

                    }, 500);
                } else {
                    isProcessingEvent = false; // Reset flag if room doesn't match
                }

            });
        } catch(e) {
            window.onload = initialiseTable;
            isProcessingEvent = false; // Reset flag if there is an error
        }
    }

    function voicePatient(code, position){
        let synth = window.speechSynthesis;
        let utterThis = new SpeechSynthesisUtterance('Turno: ' + code);
        utterThis.lang = 'es-ES';
        synth.speak(utterThis);

        setTimeout(() => {
            let utterThis = new SpeechSynthesisUtterance('Favor pasar a la posicion ' + position);
            utterThis.lang = 'es-ES';
            synth.speak(utterThis);
        }, 1000);
    }

</script>

{{-- <script>

    $(document).ready(function(){
        $('.carousel').carousel()
        conexionEvent();
        setInterval(() => {
            conexionEvent();
        }, 500000);
    });

    const audio = new Audio("{{ asset('song/turno.mp3') }}");

    function conexionEvent(){

        try {
            window.addEventListener('call-shift', event => {

                let patient_name = event.detail[0].shift.patient_name;
                let room = event.detail[0].shift.room;
                let code = event.detail[0].shift.code;
                let position = event.detail[0].shift.position;

                $("#nshift").html(code);
                $("#nposition").html(position);

                if (room === '{{ $room }}') {
                    setTimeout(() => {

                        //open modal
                        $("#llamada-turno").modal('show');

                        //play sound
                        // audio.play();

                        //call turn
                        voicePatient(code, position);

                        //close modal
                        setTimeout(() => {
                            $("#llamada-turno").modal('hide');
                        }, 5000);

                    }, 500);
                }

            })
        } catch(e) {
            window.onload = initialiseTable;
        }

    }

    function voicePatient(code, position){

        let synth = window.speechSynthesis
        let utterThis = new SpeechSynthesisUtterance('Turno: '+code)
        utterThis.lang = 'es-ES';
        synth.speak(utterThis)

        setTimeout(()=>{
        let utterThis = new SpeechSynthesisUtterance('Favor pasar a la posicion '+position);
        utterThis.lang = 'es-ES';
        synth.speak(utterThis);
        },1000);

    }

</script> --}}

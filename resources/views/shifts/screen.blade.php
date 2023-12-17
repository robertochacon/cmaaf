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

        <livewire:broadcasting/>

        @livewire('shifts')

    </div>

    <div class="col-6 p-3 row justify-content-center">
        <iframe width="560" style="height:60vh" src="https://www.youtube.com/embed/o6yWaGgp6Jc?si=wvJM6Aknl1u6GKCQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
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

<script src="{{ asset('js/jquery/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>

@livewireScripts

<script>

    window.addEventListener('call-shift', event => {

        let code = event.detail[0].shift.code;
        let position = event.detail[0].shift.position;
        console.log(position);

        $("#nshift").html(code);
        $("#nposition").html(position);

        setTimeout(() => {

            //open modal
            $("#llamada-turno").modal('show');

            //play sound
            const audio = new Audio("{{ asset('song/turno.mp3') }}");
            audio.play();

            //close modal
            setTimeout(() => {
                $("#llamada-turno").modal('hide');
            }, 5000);

        }, 1000);

    })

    // $(document).ready(function(){
    // });

</script>

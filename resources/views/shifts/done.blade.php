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
    <div class="col-5 text-center">
        <h1>
            <b>Codigo</b>
            {{ $request['code'] }}
        </h1>
    </div>
</div>

<script>
    // setTimeout(() => {
    //     window.location.hostname = '/request';
    // }, 3000);
</script>

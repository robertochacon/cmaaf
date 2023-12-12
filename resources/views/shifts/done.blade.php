@include('share/header')

<nav class="navbar navbar-white bg-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <img src="{{ asset('images/logo.png') }}" alt="" width="300"  class="d-inline-block align-text-top">
        </a>
    </div>
</nav>

    <div class="row justify-content-center">
        <h1>Codigo:</h1> {{ $request['code'] }}
    </div>

<script>
    setTimeout(() => {
        window.location.hostname = '/request';
    }, 2000);
</script>

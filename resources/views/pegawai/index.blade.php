<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LKPD - BPKAD | @yield('title')</title>
    @include('layouts.pegawai.css')
</head>
<body class="light">
    <section id="container">
        <!--header start-->
        @include('layouts.pegawai.navbar')
        <!--header end-->

        <!--sidebar start-->
        @include('layouts.pegawai.sidebar')
        <!--sidebar end-->

        <!--main content start-->
        @include('layouts.pegawai.content')
        <!--main content end-->

        {{-- footer start --}}
        @include('layouts.pegawai.footer')
        {{-- footer end --}}
    </section>

    @include('layouts.pegawai.js')
</body>
</html>

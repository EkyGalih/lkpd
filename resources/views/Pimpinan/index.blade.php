<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LKPD - BPKAD</title>
    @include('layouts.pimpinan.css')
</head>
<body class="light">
    <section id="container">
        <!--header start-->
        @include('layouts.pimpinan.navbar')
        <!--header end-->

        <!--sidebar start-->
        @include('layouts.pimpinan.sidebar')
        <!--sidebar end-->

        <!--main content start-->
        @include('layouts.pimpinan.content')
        <!--main content end-->

        {{-- footer start --}}
        @include('layouts.pimpinan.footer')
        {{-- footer end --}}
    </section>

    @include('layouts.pimpinan.js')
</body>
</html>

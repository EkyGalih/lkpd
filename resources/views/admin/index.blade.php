<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LKPD - BPKAD | @yield('title')</title>
    @include('layouts.admin.css')
</head>
<body class="light">
    <section id="container">
        <!--header start-->
        @include('layouts.admin.navbar')
        <!--header end-->

        <!--sidebar start-->
        @include('layouts.admin.sidebar')
        <!--sidebar end-->

        <!--main content start-->
        @include('layouts.admin.content')
        <!--main content end-->

        {{-- footer start --}}
        @include('layouts.admin.footer')
        {{-- footer end --}}
    </section>

    @include('layouts.admin.js')
</body>
</html>

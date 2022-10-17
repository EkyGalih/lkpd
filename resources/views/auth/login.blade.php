<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>APBD - LKPD | BPKAD PROVINSI NTB</title>

    <!-- Favicons -->
    <link href="{{ asset('images/favicon.ico') }}" rel="icon">
    <link href="{{ asset('images/favicon.ico') }}" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('lib/font-awesome/css/all.css') }}" rel="stylesheet" />
    <!-- sweetalert css -->
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet">
</head>

<body>
    <div id="login-page">
        <div class="container" style="margin-top: 125px;">
            <form class="form-login" action="{{ route('login') }}" method="POST">
                @csrf
                <h2 class="form-login-heading">Form Masuk</h2>
                <div class="login-wrap">
                    <input type="text" name="username" class="form-control" placeholder="Username atau Email" autofocus>
                    <br>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <label class="checkbox" style="margin-left: 20px">
                        <input type="checkbox" name="rememberme" value="1"> Ingat Saya
                        <span class="pull-right">
                            <a data-toggle="modal" href="#LupaSandi"> Lupa Sandi?</a>
                        </span>
                    </label>
                    <button class="btn btn-theme btn-block" type="submit"><i class="fas fa-lock"></i> MASUK</button>
                    <hr>
                    <div class="login-social-link centered">
                    <div class="registration">
                        Belum punya akun?<br/>
                        <a class="javascript:;" href="#">
                            Hubungi Admin
                        </a>
                    </div>
                </div>
            </form>
            <!-- Modal -->
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="LupaSandi" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Lupa Kata Sandi ?</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('kirim-email') }}" method="POST">
                            @csrf
                            <p>Masukkan email anda yang sudah terdaftar.</p>
                            <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button"><i class="fas fa-times"></i> Cancel</button>
                            <button class="btn btn-theme" type="submit"><i class="fas fa-paper-plane"></i> kirim</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- modal -->
        </div>
    </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--BACKSTRETCH-->
    {{-- CSS for this page --}}
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    @include('layouts.sweet-alert-notification')
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="{{ asset('lib/jquery.backstretch.min.js') }}"></script>
    <script>
        $.backstretch("{{ asset('images/login-bg.png') }}", {
            speed: 500
        });
    </script>
</body>

</html>

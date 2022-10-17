<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Reset Kata Sandi</title>

    <!-- Favicons -->
    <link href="{{ asset('images/icon.png') }}" rel="icon">
    <link href="{{ asset('images/icon.png') }}" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('lib/font-awesome/css/all.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet">
</head>

<body>
    <div id="login-page">
        <div class="container">
            <form class="form-login" action="{{ route('ganti-password', $token) }}" method="POST">
                @csrf
                @method('PUT')
                <h2 class="form-login-heading">Ganti Kata Sandi</h2>
                <div class="login-wrap">
                    <input type="password" name="password1" class="form-control" placeholder="Kata Sandi baru" autofocus>
                    <br>
                    <input type="password" name="password2" class="form-control" placeholder="Konfirmasi Sandi Baru">
                    <br/>
                    <button class="btn btn-theme btn-block" type="submit"><i class="fas fa-edit"></i> Ubah Sandi</button>
                </div>
            </form>
        </div>
    </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}"></script>
    @include('layouts.sweet-alert-notification')
    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="{{ asset('lib/jquery.backstretch.min.js') }}"></script>
    <script>
        $.backstretch("{{ asset('images/login-bg.png') }}", {
            speed: 500
        });
    </script>
</body>

</html>

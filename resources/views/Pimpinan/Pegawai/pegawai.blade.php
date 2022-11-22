@extends('Pimpinan.index')
@section('title', 'Pengguna')
@section('menu-tools', 'active')
@section('show-menu-tools', 'show')
@section('pengguna', 'active')
@section('css-additional')
    <style>
        .our-team {
            padding: 30px 0 40px;
            background: #fff;
            text-align: center;
            overflow: hidden;
            position: relative;
        }

        .our-team .pic {
            display: inline-block;
            width: 130px;
            height: 130px;
            margin-bottom: 50px;
            /*background:#1276d5;*/
            position: relative;
            z-index: 1;
        }

        .our-team .pic:before {
            content: "";
            width: 100%;
            background: #1276d5;
            position: absolute;
            bottom: 135%;
            right: 0;
            left: 0;
            transform: scale(3);
            transition: all 0.3s linear 0s;
        }

        .our-team:hover .pic:before {
            height: 100%;
        }

        .our-team .pic:after {
            content: "";
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: #1276d5;
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .our-team .pic img {
            width: 100%;
            height: auto;
            border-radius: 50%;
            transform: scale(1);
            transition: all 0.9s ease 0s;
        }

        .our-team:hover .pic img {
            box-shadow: 0 0 0 14px #1276d5;
            transform: scale(0.7);
        }

        .our-team .team-content {
            margin-bottom: 30px;
        }

        .our-team .title {
            font-size: 22px;
            font-weight: 700;
            color: #4e5052;
            letter-spacing: 1px;
            text-transform: capitalize;
            margin-bottom: 5px;
        }

        .our-team .post {
            display: block;
            font-size: 15px;
            color: #4e5052;
            text-transform: capitalize;
        }

        .our-team .social {
            width: 100%;
            padding: 0;
            margin: 0;
            background: #1276d5;
            position: absolute;
            bottom: -100px;
            left: 0;
            transition: all 0.5 ease 0s;
        }

        .our-team:hover .social {
            bottom: 0;
        }

        .our-team .social li {
            display: inline-block;
        }

        .our-team .social li a {
            display: block;
            padding: 10px;
            font-size: 17px;
            color: #fff;
            transition: all 0.3s ease 0s;
        }

        .our-team .social li a:hover {
            color: #eb1768;
            background: #f7f5ec;
            text-decoration: none;

        }

        .profile {
            min-height: 355px;
            display: inline-block;
        }

        figcaption.ratings {
            margin-top: 20px;
        }

        figcaption.ratings a {
            color: #f1c40f;
            font-size: 11px;
        }

        figcaption.ratings a:hover {
            color: #f39c12;
            text-decoration: none;
        }

        .divider {
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        .emphasis {
            border-top: 4px solid transparent;
        }

        .emphasis:hover {
            border-top: 4px solid #1abc9c;
        }

        .emphasis h2 {
            margin-bottom: 0;
        }

        span.tags {
            background: #1abc9c;
            border-radius: 2px;
            color: #f5f5f5;
            font-weight: bold;
            padding: 2px 4px;
        }

        .dropdown-menu {
            background-color: #34495e;
            box-shadow: none;
            -webkit-box-shadow: none;
            width: 250px;
            margin-left: -125px;
            left: 50%;
        }

        .dropdown-menu .divider {
            background: none;
        }

        .dropdown-menu>li>a {
            color: #f5f5f5;
        }

        .dropup .dropdown-menu {
            margin-bottom: 10px;
        }

        .dropup .dropdown-menu:before {
            content: "";
            border-top: 10px solid #34495e;
            border-right: 10px solid transparent;
            border-left: 10px solid transparent;
            position: absolute;
            bottom: -10px;
            left: 50%;
            margin-left: -10px;
            z-index: 10;
        }
    </style>
@endsection
@section('content')
    <h3><a href="{{ route('iku-realisasi.index') }}"><i class="fas fa-users"></i> Pegawai BPKAD Prov.NTB</a></h3>
    <hr />
    <div class="row mt">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-10">
                    <h4 class="title">Pengguna</h4>
                </div>
            </div>
            <hr />
            @include('Pimpinan.Pegawai.Addons.table')
        </div>
    </div>
@endsection
@section('js-additional')
    <script>
        function makeid(length) {
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }

        $('#password').val(makeid(20));
        $('#password_reset').val(makeid(20));

        function randomPass() {
            $('#password').val(makeid(20));
            $('#password_reset').val(makeid(20));
        }
    </script>
@endsection

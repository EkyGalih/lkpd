@extends('admin.index')
@section('title', 'Pengguna')
@section('menu-tools', 'active')
@section('show-menu-tools', 'show')
@section('pengguna', 'active')
@section('content')
    <h3><a href="{{ route('iku-realisasi.index') }}"><i class="fas fa-users"></i> Pengguna</a></h3>
    <hr />
    <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">
                <div class="row">
                    <div class="col-lg-10">
                        <h4 class="title">Pengguna</h4>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-theme btn-sm" data-toggle="modal" data-target="#TambahData">
                            <i class="fas fa-user-plus"></i> Tambah Pengguna
                        </button>
                        @include('admin.Pengguna.Addons.add')

                    </div>
                </div>

                <hr />
                @include('admin.Pengguna.Addons.table')
            </div>
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

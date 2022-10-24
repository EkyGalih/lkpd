@extends('admin.index')
@section('title', 'Divisi')
@section('menu-tools', 'active')
@section('show-menu-tools', 'show')
@section('divisi', 'active')
@section('content')
    <h3><a href="{{ route('iku-realisasi.index') }}"><i class="fas fa-building"></i> Divisi</a></h3>
    <hr />
    <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">
                <div class="row">
                    <div class="col-lg-11">
                        <h4 class="title">Divisi</h4>
                    </div>
                    <div class="col-lg-1">
                        <button type="button" class="btn btn-theme btn-sm" data-toggle="modal" data-target="#TambahData">
                            <i class="fas fa-plus"></i> Tambah Divisi
                        </button>
                        @include('admin.Divisi.Addons.add')

                    </div>
                </div>

                <hr />
                @include('admin.Divisi.Addons.table')
            </div>
        </div>
    </div>
@endsection
@section('js-additional')
<script>
    $(document).ready(function () {
        $('#nama_divisi').keypress(function () {
            var fakultas = $('#nama_divisi').val();
            var fk = fakultas.split(' ');
            var kode = "";
            fk.forEach(function (e) {
                var tampung = e.substr(0, 1);
                kode += tampung;
            });
            $('#alias_divisi').val(kode);
        });
    });
</script>
@endsection

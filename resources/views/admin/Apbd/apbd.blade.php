@extends('admin.index')
@section('title', 'APBD')

@section('menu-anggaran', 'active')

@section('css-additional')
    <link rel="stylesheet" href="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.css') }}">
    {{-- <script src="{{ asset('lib/chart-master/Chart.js') }}"></script> --}}
    {{-- <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css"> --}}
@endsection
@section('content')
    <h3><a href="{{ route('apbd') }}"><i class="fas fa-journal-whills"></i> APBD PROVINSI NUSA TENGGARA BARAT (NTB)</a></h3>
    <hr />
    <div class="row mt">
        <div class="col-lg-12">
            @include('admin.Apbd.Components.table')
        </div>
        @include('admin.Apbd.Components.import')
        @include('admin.Apbd.Components.add')
    </div>
    <div class="row mt">
        <div class="col-lg-6">
            <div class="content-panel">
                <canvas id="apbd-chart"></canvas>
            </div>
        </div>
    </div>
@endsection
@section('js-additional')
    <script src="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('lib/jquery-mask/jquery-mask.js') }}"></script>
    <script>

        $('apbd-table').dataTable();

        tahun_anggaran = $('#get_ta').val();

        function getApbd(){
            ta = $('#tahun_anggaran').val();
            window.location.href = window.location.origin + '/admin/anggaran/' + ta
        }

        jumlah_pendapatan1 = $('#jumlah_pendapatan1').val();
        jumlah_pendapatan2 = $('#jumlah_pendapatan2').val();
        selisih_pendapatan = Math.abs(jumlah_pendapatan1 - jumlah_pendapatan2);

        jumlah_belanja1 = $('#jumlah_belanja1').val();
        jumlah_belanja2 = $('#jumlah_belanja2').val();
        selisih_belanja = Math.abs(jumlah_belanja1 - jumlah_belanja2);

        jumlah_pembiayaan1 = $('#jumlah_pembiayaan1').val();
        jumlah_pembiayaan2 = $('#jumlah_pembiayaan2').val();
        selisih_pembiayaan = Math.abs(jumlah_pembiayaan1 - jumlah_pembiayaan2);
    </script>
    @include('layouts.admin.Script.apbd.add-script')
    @include('layouts.admin.Script.apbd.edit-script')
    @include('layouts.admin.Script.apbd-chart')
@endsection

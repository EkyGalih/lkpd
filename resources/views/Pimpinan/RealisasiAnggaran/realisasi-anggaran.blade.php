@extends('Pimpinan.index')
@section('title', 'Laporan Realisasi Anggaran')

@section('menu-realisasi-anggaran', 'active')

@section('css-additional')
    <link rel="stylesheet" href="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.css') }}">
@endsection
@section('content')
    <h3><a href="{{ route('realisasi-anggaran-pimpinan') }}"><i class="fas fa-book-open"></i> LAPORAN REALISASI ANGGARAN APBD</a>
    </h3>
    <hr />
    <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">
                <div class="row">
                    <div class="col-lg-8" style="text-align: center;">
                        <h4 class="title" style="color: #000000; font-weight: bold;">LAPORAN REALISASI ANGGARAN PENDAPATAN DAN BELANJA DAERAH (KONSOLIDASI)<br/> TAHUN ANGGARAN {{ date('Y') }}<br/>01 Januari {{ date('Y') }} Sampai {{ date('d F Y') }}</h4>
                    </div>
                    {{-- <div class="col-lg-2">
                        <select id="tahun_anggaran" class="form-control" onchange="getApbd()">
                            <option>Pilih Tahun Anggaran</option>
                            @foreach ($get_tahun as $ta)
                                <option value="{{ $ta->tahun_anggaran }}" {{ $ta->tahun_anggaran == $tahun_anggaran ? 'selected' : '' }}>{{ $ta->tahun_anggaran }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <input type="hidden" value="{{ $get_tahun == null ? date('Y') : $tahun_anggaran }}" id="get_ta">
                </div>
                <hr />
                <div class="row">
                    <div class="col-lg-12">
                        @include('Pimpinan.RealisasiAnggaran.Components.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">
                <canvas id="RealisasiAnggaran-chart"></canvas>
            </div>
        </div>
    </div>
@endsection
@section('js-additional')
    <script src="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('lib/jquery-mask/jquery-mask.js') }}"></script>
    <script>
        $(".switch").click(function() {
            $(this).toggleClass("switchOn");
        })
        $('#anggaran_terealisasi').maskMoney({
            precision: 0
        });

        $('#realisasi-table').dataTable();

        tahun_anggaran = $('#get_ta').val();

        jumlah_pendapatan2 = $('#jumlah_pendapatan2').val();
        selisih_pendapatan = Math.abs(jumlah_pendapatan1 - jumlah_pendapatan2);

        jumlah_belanja1 = $('#jumlah_belanja1').val();
        jumlah_belanja2 = $('#jumlah_belanja2').val();
        selisih_belanja = Math.abs(jumlah_belanja1 - jumlah_belanja2);

        jumlah_pembiayaan1 = $('#jumlah_pembiayaan1').val();
        jumlah_pembiayaan2 = $('#jumlah_pembiayaan2').val();
        selisih_pembiayaan = Math.abs(jumlah_pembiayaan1 - jumlah_pembiayaan2);
    </script>
    @include('layouts.pimpinan.Script.apbd-chart')
@endsection

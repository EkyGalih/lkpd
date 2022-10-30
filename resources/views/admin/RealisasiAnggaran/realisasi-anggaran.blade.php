@extends('admin.index')
@section('title', 'Laporan Realisasi Anggaran')

@section('menu-realisasi-anggaran', 'active')

@section('css-additional')
    <link rel="stylesheet" href="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.css') }}">
    <style>
        .toggleswitch input{
            display: none;
        }

        .toggleswitch{
            width: 100px;
            height: 30px;
            position: relative;
            display: inline-block;
        }

        .toggleswitch .konten{
            border: 2px solid palegoldenrod;
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50px;
            transition: all 0.2s ease-in-out;
        }

        .toggleswitch .konten::before{
            background-color: white;
            position: absolute;
            content: '';
            width: 30px;
            height: 30px;
            border-radius: 50px;
            transition: all 0.2s ease-in-out;
            left: 3px;
        }

        .toggleswitch input:checked+.konten{
            border: 2px solid palegoldenrod;
            background-color: palevioletred;
        }

        .toggleswitch input:checked+.konten::before{
            background-color: white;
            transform: translate(65px);
        }

        .toggleswitch .teks{
            position: absolute;
            left: 50px;
            top: 5px;
            font-size: 20px;
            width: 100%;
            height: 100%;
            font-family: Georgia;
        }

        .toggleswitch .teks::after{
            content: attr(off);
            color: yellow;
            position: absolute;
            opacity: 1;
            transition: all 0.2s ease-in-out;
        }

        .toggleswitch .teks::before{
            content: attr(on);
            position: absolute;
            opacity: 1;
            right: 50px;
            transition: all 0.2s ease-in-out;
        }

        .toggleswitch input:checked~.teks::after{
            opacity: 0;
        }

        .toggleswitch input:checked~.teks::before{
            opacity: 1;
        }
    </style>
@endsection
@section('content')
    <h3><a href="{{ route('realisasi-anggaran-admin') }}"><i class="fas fa-book-open"></i> LAPORAN REALISASI ANGGARAN APBD</a>
    </h3>
    <hr />
    <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">
                <div class="row">
                    <div class="col-lg-8">
                        <h4 class="title"><i class="fas fa-list"></i> Realisasi Anggaran {{ $tahun_anggaran }}</h4>
                    </div>
                    <div class="col-lg-2">
                        <select id="tahun_anggaran" class="form-control">
                            <option>Pilih Tahun Anggaran</option>
                            @foreach ($get_tahun as $ta)
                                <option value="{{ $ta->tahun_anggaran }}">{{ $ta->tahun_anggaran }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-success btn-sm" data-tooltip="tooltip" data-placement="top"
                            title="Edit Anggaran" data-toggle="modal" data-target="#modalEdit">
                            <i class="fas fa-edit"></i> Update Anggaran
                        </button>
                        @include('admin.RealisasiAnggaran.Components.edit')
                    </div>
                    <input type="hidden" value="{{ $ta->tahun_anggaran }}" id="get_ta">
                </div>
                <hr />
                <div class="row">
                    <div class="col-lg-12">
                        @include('admin.RealisasiAnggaran.Components.table')
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
    @include('layouts.admin.Script.apbd-chart')
@endsection

@extends('pegawai.index')
@section('title', 'Indikator Kinerja')
@section('menu-iku-realisasi', 'active')
@section('iku-sasaran', 'active')
@section('content')
    <h3><a href="{{ route('iku-realisasi.index') }}"><i class="fas fa-dot-circle"></i> Sasaran Strategis</a></h3>
    <hr />
    <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">
                <div class="row">
                    <div class="col-lg-10">
                        <h4 class="title">Sasaran Strategis</h4>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-theme btn-sm" data-toggle="modal" data-target="#TambahData">
                            <i class="fas fa-plus"></i> Tambah Data
                        </button>
                        @include('pegawai.iku_realisasi.Addons.SasaranStrategis.add')

                    </div>
                </div>

                <hr />
                @include('pegawai.iku_realisasi.Addons.SasaranStrategis.table')
            </div>
        </div>
    </div>
@endsection

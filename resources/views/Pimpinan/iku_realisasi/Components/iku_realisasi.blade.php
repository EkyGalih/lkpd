@extends('Pimpinan.index')
@section('title', 'IKU & Realisasi')
@section('menu-iku-realisasi', 'active')
@section('iku-realisasi', 'active')
@section('content')
    <h3><a href="{{ route('iku-realisasi-pimpinan.index') }}"><i class="fas fa-book"></i> IKU & Realisasi BPKAD</a></h3>
    <hr />
    <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">
                <div class="row">
                    <div class="col-lg-10">
                        <h4 class="title"><i class="fas fa-list"></i> Capaian Iku & Realisasi</h4>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        @include('Pimpinan.iku_realisasi.Addons.IkuRealisasi.table-iku')
                    </div>
                    <div class="col-lg-1"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

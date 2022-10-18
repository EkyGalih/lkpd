@extends('admin.index')
@section('title', 'IKU & Realisasi')
@section('menu-iku-realisasi', 'active')
@section('iku-realisasi', 'active')
@section('content')
    <h3><a href="{{ route('iku-realisasi.index') }}"><i class="fas fa-book"></i> IKU & Realisasi BPKAD</a></h3>
    <hr />
    <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">
                <div class="row">
                    <div class="col-lg-10">
                        <h4 class="title"><i class="fas fa-list"></i> Capaian Iku & Realisasi</h4>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-theme btn-sm" data-toggle="modal" data-target="#TambahData">
                            <i class="fas fa-plus"></i> Tambah Data
                        </button>
                        @include('admin.iku_realisasi.Addons.IkuRealisasi.add')

                    </div>
                </div>
                <hr />
                @include('admin.iku_realisasi.Addons.IkuRealisasi.table')
            </div>
        </div>
    </div>
@endsection

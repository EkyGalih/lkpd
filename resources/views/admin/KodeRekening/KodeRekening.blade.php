@extends('admin.index')
@section('title', 'Kode Rekening')

@section('menu-tools', 'active')
@section('show-menu-tools', 'show')
@section('kode-rekening', 'active')

@section('css-additional')
<link rel="stylesheet" href="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.css') }}">
@endsection

@section('content')
<h3><a href="{{ route('kode-rekening-admin') }}"><i class="fas fa-barcode"></i> Kode Rekening</a></h3>
<div class="row mt">
    <div class="col-lg-8">
        <div class="content-panel" style="padding: 10px;">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped" id="data-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Rekening</th>
                            <th>Kode Rekening</th>
                            <th>REF</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kodeRekening as $rekening)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $rekening->nama_rekening }}</td>
                            <td>{{ $rekening->kode_rekening }}</td>
                            <td>{{ $rekening->ref }}</td>
                            <td>
                                <a href="{{ route('kode-rekening-admin', $rekening->rekening_id) }}" class="btn btn-warning btn-xs" data-tooltip="tooltip" data-placement="top" title="Edit Kode Rekening">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-xs" data-tooltip="tooltip" data-placement="top" title="Hapus Kode Rekening" onclick="deleteData('{{ route('kode-rekening-admin.destroy', $rekening->rekening_id) }}')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="content-panel" style="padding: 10px;">
            <form action="{{ isset($rekeningDetail) ? route('kode-rekening-admin.update', $rekeningDetail->rekening_id) : route('kode-rekening-admin.store') }}" method="POST" onsubmit="return validateForm()">
                @csrf
                @if (isset($rekeningDetail))
                @method('PUT')
                @endif
                <div class="row">
                    <div class="col-lg-9">
                        <h4><i class="fas fa-{{ isset($rekeningDetail) ? 'edit' : 'plus' }}"></i> Tambah Kode Rekening</h4>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-theme btn-sm" data-toggle="modal" data-target="#ModalImport">
                            <i class="fas fa-upload"></i> Import Data
                        </button>
                    </div>
                </div>
                <hr/>
                <div class="form-group" id="hidden_div" style="display: {{ $jenis_rekening == 'rekening' ? 'none' : 'block' }};">
                    <label for="kode_rekening">Kode Rekening Indux</label>
                    <select name="sub_kode_rekening" id="sub_kode" class="form-control"></select>
                </div>
                <div class="form-group">
                    <label for="nama_rekening">Nama Rekening</label>
                    <input type="text" name="nama_rekening" class="form-control" value="{{ isset($rekeningDetail) ? $rekeningDetail->nama_rekening : '' }}" required="true">
                </div>
                <div class="form-group">
                    <label for="kode_rekening">Kode Rekening</label>
                    <input type="text" name="kode_rekening" class="form-control" value="{{ isset($rekeningDetail) ? $rekeningDetail->kode_rekening : '' }}" required="true">
                </div>
                <div class="form-group">
                    <label for="ref">Ref</label>
                    <input type="text" name="ref" class="form-control" value="{{ isset($rekeningDetail) ? $rekeningDetail->ref : '' }}" required="true">
                </div>
                <button type="submit" class="btn btn-{{ isset($rekeningDetail) ? 'success' : 'theme' }} btn-sm" id="simpan"><i class="fas fa-save"></i> Simpan</button>
                @if (isset($rekeningDetail))
                <a href="{{ route('kode-rekening-admin') }}" class="btn btn-warning btn-sm"><i class="fas fa-sync"></i> Reset</a>
                @endif
            </form>

            {{-- MODAL IMPORT KODE REKENING --}}
            <div class="modal fade" id="ModalImport" tabindex="-1" aria-labelledby="ModalImport" aria-hidden="true">
                <div class="modal-dialog modal-sm" style="margin-top: 14%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><i class="fas fa-upload"></i> Import Kode Rekening</h5>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('kode-rekening-admin.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <span class="btn btn-theme02 btn-file">
                                        <span class="fileupload-new"><i class="fas fa-paperclip"></i> Pilih File</span>
                                        <span class="fileupload-exists"><i class="fas fa-undo"></i> Ubah</span>
                                        <input type="file" class="default" name="data-kode-rekening">
                                    </span>
                                    <span class="fileupload-preview" style="margin-left: 5px;"></span>
                                    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left: 5px;"></a>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-theme04" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-theme">upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('js-additional')
<script src="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>
@endsection

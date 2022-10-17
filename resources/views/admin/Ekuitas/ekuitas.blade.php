@extends('admin.index')
@section('title', 'Laporan Perubahan Ekuitas')

@section('menu-laporan', 'active')
@section('show-menu-laporan', 'show')
@section('perubahan-ekuitas', 'active')

@section('css-additional')
<link rel="stylesheet" href="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.css') }}">
@endsection
@section('content')
<h3><a href="{{ route('ekuitas-admin') }}"><i class="fas fa-cash-register"></i> Laporan Perubahan Ekuitas</a></h3>
<hr/>
<div class="row mt">
    <div class="col-lg-6">
        <div class="content-panel">
            <div class="row">
                <div class="col-lg-8">
                    <h4 class="title"><i class="fas fa-list"></i> Data Ekuitas</h4>
                </div>
                <div class="col-lg-4">
                   <select id="tahun_anggaran" class="form-control">
                    <option>Pilih Tahun Anggaran</option>
                   </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="content-panel">

            <!-- tombol tambah dan import -->
            <div class="row">
                <div class="col-lg-6">
                    <h4><i class="fas fa-plus"></i> Tambah Data</h4>
                </div>
                <div class="col-lg-6">
                    <div class="btn-group pull-right" style="margin-right: 10px;">
                        <button type="button" data-toggle="modal" data-target="#ArusKas" class="btn btn-success btn-md">
                            <i class="fas fa-file-excel"></i>
                            <span>Import Data</span>
                        </button>
                    </div>

                    <!-- modal import -->
                    <div class="modal fade" id="ArusKas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="margin-top: 14%;">
                                <div class="modal-header">
                                    <h5 class="modal-title">Import Data Arus Kas</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('ekuitas-admin.import') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <span class="btn btn-theme02 btn-file">
                                                <span class="fileupload-new"><i class="fas fa-paperclip"></i> Pilih File</span>
                                                <span class="fileupload-exists"><i class="fas fa-undo"></i> Ubah</span>
                                                <input type="file" class="default" name="data-arus-kas">
                                            </span>
                                            <span class="fileupload-preview" style="margin-left: 5px;"></span>
                                            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left: 5px;"></a>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-theme04" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-theme">Import</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <hr/>
            <form method="POST" action="{{ route('arus-kas-admin.store') }}" style="margin-left: 10px; margin-right: 10px;">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenis_laporan">Aktifitas Arus Kas</label>
                            <select name="jenis_laporan" class="form-control">
                                <option>Pilih</option>
                                <option value="operasi">Arus Kas dari Aktivitas Operasi</option>
                                <option value="investasi">Arus Kas dari Aktivitas Investasi</option>
                                <option value="pendanaan">Arus Kas dari Aktivitas Pendanaan</option>
                                <option value="transitoris">Arus Kas dari Aktivitas Transitoris</option>
                                <option value="kas_bos">Kas Bos</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ref">Ref</label>
                            <input type="text" name="ref1" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenis_arus_kas">Jenis Arus Kas</label>
                            <select name="jenis_arus_kas" class="form-control">
                                <option>Pilih</option>
                                <option value="masuk">Arus Masuk Kas</option>
                                <option value="keluar">Arus Keluar Kas</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ref2">Ref</label>
                            <input type="text" name="ref2" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="uraian">Uraian</label>
                            <input type="text" name="uraian" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ref">REF</label>
                            <input type="text" name="ref" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tahun_anggaran">Tahun Anggaran</label>
                            <input type="text" name="tahun_anggaran" class="form-control" onkeypress="isInputNumber(event)">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="anggaran">Anggaran</label>
                            <input type="text" name="anggaran" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tahun_anggaran">Tahun Anggaran</label>
                            <input type="text" name="tahun_anggaran" class="form-control" onkeypress="isInputNumber(event)">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="anggaran">Anggaran</label>
                            <input type="text" name="anggaran" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sub_total_saldo">Sub Total Saldo Kas</label>
                            <input type="text" name="sub_total_saldo" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="total_saldo">Total Saldo Kas</label>
                            <input type="text" name="total_saldo" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group" style="margin-right: 10px;">
                        <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                        <input type="hidden" name="status_laporan" value="unaudited">
                        <div class="btn-group pull-right">
                            <button type="reset" class="btn btn-danger btn-md">
                                <i class="fas fa-sync"></i>
                                <span>Reset Form</span>
                            </button>
                            <button type="submit" class="btn btn-theme btn-md">
                                <i class="fas fa-save"></i>
                                <span>Simpan</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js-additional')
<script src="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>
@endsection

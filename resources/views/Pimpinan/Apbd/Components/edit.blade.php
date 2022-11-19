@extends('admin.index')
@section('title', 'Edit Anggaran APBD')
@section('content')
    <h3><a href="{{ route('apbd') }}"><i class="fas fa-journal-whills"></i> APBD PROVINSI NUSA TENGGARA BARAT (NTB)</a></h3>
    <hr />
    <div class="row mt">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="title"><i class="fas fa-edit"></i> Edit Anggaran<br /><br />
                        <strong><u>{{ substr($apbd->kode_rekening, 0,1) }} - {{ $apbd->nama_rekening }}</u></strong><br/>
                        <strong><u>{{ substr($apbd->kode_rekening, 0,3) }} - {{ $apbd->uraian }}</u></strong><br/>
                        <strong><u>{{ $apbd->kode_rekening }} - {{ $apbd->sub_uraian }}</u></strong><br/>
                    </h4>
                    <hr />
                </div>
                <div class="col-lg-5">
                    <div class="content-panel">
                        <form method="POST" action="{{ route('pegawai-apbd.update', $apbd->id) }}"
                            style="margin-left: 10px; margin-right: 10px;">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="anggaran_sebelum_perubahan">MURNI</label>
                                        <input type="text" name="jml_anggaran_sebelum" id="jml_anggaran_sebelum_edit"
                                            class="form-control" value="{{ $apbd->jml_anggaran_sebelum }}"
                                            onkeypress="isInputNumber(event)">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="anggaran_setelah_perubahan">PERUBAHAN</label>
                                        <input type="text" name="jml_anggaran_setelah" id="jml_anggaran_setelah_edit"
                                            class="form-control" value="{{ $apbd->jml_anggaran_setelah }}"
                                            onkeypress="isInputNumber(event)">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="selisih">Bertambah/(Berkurang)</label>
                                        <input type="text" name="selisih" id="selisih_edit" class="form-control"
                                            value="{{ $apbd->selisih_anggaran }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="persen">%</label>
                                        <input type="text" name="persen" id="persen_edit" class="form-control"
                                            value="{{ $apbd->persen }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <button type="submit" class="btn btn-theme">Simpan</button>
                            <button type="button" class="btn btn-theme04" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-additional')
    <script src="{{ asset('lib/jquery-mask/jquery-mask.js') }}"></script>
    @include('layouts.admin.Script.apbd.edit-script')
@endsection

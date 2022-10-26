<div class="modal fade" id="modalEdit{{ $item['apbd_id'] }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fas fa-edit"></i> Update Data</h3>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('pegawai-apbd.update', $item['apbd_id']) }}"
                    style="margin-left: 10px; margin-right: 10px;">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="kode_rekening">Nama Rekening</label>
                                <select name="kode_rekening" id="kode_rekening_edit" class="form-control"
                                    onchange="editKodeRekening()">
                                    <option value="">Pilih</option>
                                    @foreach ($kodeRekening as $kode)
                                        @if (strlen($kode->kode_rekening) == 1)
                                            <option value="{{ $kode->kode_rekening }}">[{{ $kode->kode_rekening }}]
                                                {{ $kode->nama_rekening }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <input type="hidden" name="nama_rekening" id="nama_rekening_edit" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="uraian">uraian</label>
                                <select name="kode_rekening2" id="kode_rekening2_edit" class="form-control"
                                    onchange="getSubKode()"></select>
                                <input type="hidden" name="uraian" id="uraian_edit" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="sub_uraian">Sub Uraian</label>
                                <select name="kode_rekening3" id="kode_rekening3_edit" class="form-control"
                                    onchange="getSubUraian()"></select>
                                <input type="hidden" name="sub_uraian" id="sub_uraian_edit" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="anggaran_sebelum_perubahan">Anggaran Sebelum Perubahan</label>
                                <input type="text" name="jml_anggaran_sebelum" id="jml_anggaran_sebelum_edit"
                                    class="form-control" value="{{ $item['jml_anggaran_sebelum'] }}"
                                    onkeypress="isInputNumber(event)">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="anggaran_setelah_perubahan">Anggaran Setelah Perubahan</label>
                                <input type="text" name="jml_anggaran_setelah" id="jml_anggaran_setelah_edit"
                                    class="form-control" value="{{ $item['jml_anggaran_setelah'] }}"
                                    onkeypress="isInputNumber(event)">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="selisih">Bertambah/(Berkurang)</label>
                                <input type="text" name="selisih" id="selisih_edit" class="form-control"
                                    value="{{ $item['selisih_anggaran'] }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="persen">%</label>
                                <input type="text" name="persen" id="persen_edit" class="form-control"
                                    value="{{ $item['persen'] }}" readonly>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{ $user->user_id }}">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-theme">Simpan</button>
                <button type="button" class="btn btn-theme04" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>

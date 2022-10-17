<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fas fa-plus-square"></i> Tambah Data</h3>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('apbd.store') }}" style="margin-left: 10px; margin-right: 10px;">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="kode_rekening">Nama Rekening</label>
                                <select name="kode_rekening" id="kode_rekening" class="form-control"
                                    onchange="getKodeRekening()">
                                    <option value="">Pilih</option>
                                    @foreach ($kodeRekening as $kode)
                                        @if (strlen($kode->kode_rekening) == 1)
                                            <option value="{{ $kode->kode_rekening }}">[{{ $kode->kode_rekening }}]
                                                {{ $kode->nama_rekening }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <input type="hidden" name="nama_rekening" id="nama_rekening" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="uraian">uraian</label>
                                <select name="kode_rekening2" id="kode_rekening2" class="form-control"
                                    onchange="getSubKode()"></select>
                                <input type="hidden" name="uraian" id="uraian" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="sub_uraian">Sub Uraian</label>
                                <select name="kode_rekening3" id="kode_rekening3" class="form-control"
                                    onchange="getSubUraian()"></select>
                                <input type="hidden" name="sub_uraian" id="sub_uraian" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="anggaran_sebelum_perubahan">Anggaran Sebelum Perubahan</label>
                                <input type="text" name="jml_anggaran_sebelum" id="jml_anggaran_sebelum"
                                    class="form-control" onkeypress="isInputNumber(event)">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="anggaran_setelah_perubahan">Anggaran Setelah Perubahan</label>
                                <input type="text" name="jml_anggaran_setelah" id="jml_anggaran_setelah"
                                    class="form-control" onkeypress="isInputNumber(event)">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="selisih">Bertambah/(Berkurang)</label>
                                <input type="text" name="selisih" id="selisih" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="persen">%</label>
                                <input type="text" name="persen" id="persen" class="form-control" readonly>
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

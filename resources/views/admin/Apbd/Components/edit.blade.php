<div class="modal fade" id="modalEdit{{ $item['apbd_id'] }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fas fa-edit"></i> Update Data</h3>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('apbd.update', $item['apbd_id']) }}"
                    style="margin-left: 10px; margin-right: 10px;">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="anggaran_sebelum_perubahan">MURNI</label>
                                <input type="text" name="jml_anggaran_sebelum" id="jml_anggaran_sebelum_edit"
                                    class="form-control" value="{{ $item['jml_anggaran_sebelum'] }}"
                                    onkeypress="isInputNumber(event)">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="anggaran_setelah_perubahan">PERUBAHAN</label>
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

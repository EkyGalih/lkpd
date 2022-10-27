<div class="modal fade" id="modalEdit{{ $item['apbd_id'] }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document" style="margin-top: 14%;">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fas fa-edit"></i> Realisasi Anggaran</h3>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('realisasi-anggaran-admin.update', $item['realisasi_anggaran_id']) }}"
                    style="margin-left: 10px; margin-right: 10px;">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="anggaran_terealisasi">Anggaran Terealisasi</label>
                                <input type="text" name="anggaran_terealisasi" id="anggaran_terealisasi" class="form-control" value="{{ $item['anggaran_terealisasi'] }}">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-theme">Simpan</button>
                <button type="button" class="btn btn-theme04" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>

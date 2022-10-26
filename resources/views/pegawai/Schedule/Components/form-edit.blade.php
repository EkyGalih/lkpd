<div class="modal fade" id="modalEdit{{ $loop->iteration }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fas fa-envelope"></i> Perbaharui Jadwal {{ $jadwal->jenis_acara }}
                </h3>
            </div>
            <div class="modal-body">
                <form action="{{ route('pegawai.jadwalUpdate', $jadwal->schedule_id) }}" method="POST"
                    style="margin-left: 10px; margin-right: 10px;">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="jenis_acara">Jenis Kegiatan</label>
                                <input type="text" name="jenis_acara" value="{{ $jadwal->jenis_acara }}"
                                    class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Tanggal_acara">Tanggal Kegiatan</label>
                                        <input type="date" value="{{ $jadwal->tgl_acara }}" name="tgl_acara"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jam_acara">Waktu Kegiatan</label>
                                        <input type="time" value="{{ $jadwal->jam_acara }}" name="jam_acara"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="redaksi_acara">Kegiatan</label>
                                <textarea name="redaksi_acara" class="form-control" rows="10">{{ $jadwal->redaksi_acara }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="lokasi_acara">Tempat Kegiatan</label>
                                <input type="text" value="{{ $jadwal->lokasi_acara }}" name="lokasi_acara"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="acara_dari">Undangan Dari</label>
                                <input type="text" value="{{ $jadwal->acara_dari }}" name="acara_dari"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="user_id">Menghadiri</label>
                                <select name="user_id" class="form-control">
                                    <option value="">Pilih</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->user_id }}"
                                            {{ $user->user_id == $jadwal->user_id ? 'selected' : '' }}>
                                            {{ $user->nama }}</option>
                                    @endforeach
                                </select>
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

<div class="modal fade" id="EditData{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-8">
                        <h5 class="modal-title"><i class="fas fa-plus-square"></i> Ubah Data Pengguna</h5>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin-pengguna.update', $user->user_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Pengguna</label>
                        <input type="text" name="nama" id="nama" value="{{ $user->nama }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value="{{ $user->username }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="jenis_pegawai">Jenis Pegawai</label>
                        <select name="jenis_pegawai" class="form-control">
                            <option value="">-------</option>
                            <option value="admin" {{ $user->jenis_pegawai == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="pimpinan" {{ $user->jenis_pegawai == 'pimpinan' ? 'selected' : '' }}>Pimpinan</option>
                            <option value="pegawai" {{ $user->jenis_pegawai == 'pegawai' ? 'selected' : '' }}>Pegawai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="divisi_id">Divisi/Bidang</label>
                        <select name="divisi_id" class="form-control">
                            <option value="">------</option>
                            @foreach ($Divisi as $div)
                                <option value="{{ $div->divisi_id }}" {{ $user->divisi_id == $div->divisi_id ? 'selected' : '' }}>{{ $div->nama_divisi }} - ({{ $div->alias_divisi }})</option>
                            @endforeach
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-theme04" data-dismiss="modal"><i class="fas fa-times"></i>
                    Batal</button>
                <button type="submit" class="btn btn-theme03"><i class="fas fa-save"></i>
                    Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

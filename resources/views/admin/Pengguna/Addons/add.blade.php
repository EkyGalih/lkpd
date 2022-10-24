<div class="modal fade" id="TambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-8">
                        <h5 class="modal-title"><i class="fas fa-plus-square"></i> Tambah Pengguna</h5>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin-pengguna.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Pengguna</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" id="password" class="form-control">
                        <button type="button" class="btn btn-default btn-xs" onclick="randomPass()"><i class="fas fa-random"></i> Generate Password</button>
                    </div>
                    <div class="form-group">
                        <label for="jenis_pegawai">Jenis Pegawai</label>
                        <select name="jenis_pegawai" class="form-control">
                            <option value="">-------</option>
                            <option value="admin">Admin</option>
                            <option value="pimpinan">Pimpinan</option>
                            <option value="pegawai">Pegawai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="divisi_id">Divisi/Bidang</label>
                        <select name="divisi_id" class="form-control">
                            <option value="">------</option>
                            @foreach ($Divisi as $div)
                                <option value="{{ $div->divisi_id }}">{{ $div->nama_divisi }} -
                                    ({{ $div->alias_divisi }})</option>
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

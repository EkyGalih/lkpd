<div class="table-responsive">
    <table class="table table-hover table-striped table-borderd" id="data-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama pengguna</th>
                <th>Divisi/Bidang</th>
                <th>E-Mail</th>
                <th>Level Pengguna</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Pengguna as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->nama }} <i><u>[{{ $user->username }}]</u></i></td>
                    <td>{{ $user->Divisi->nama_divisi }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->jenis_pegawai == 'admin')
                            <label class="badge bg-important"><i class="fas fa-user-secret"></i> Admin</label>
                        @elseif ($user->jenis_pegawai == 'pimpinan')
                            <label class="badge bg-info"><i class="fas fa-user-tie"></i> Pimpinan</label>
                        @elseif ($user->jenis_pegawai == 'pegawai')
                            <label class="badge"><i class="fas fa-user"></i> Pegawai</label>
                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal"
                            data-target="#EditData{{ $loop->iteration }}" data-tooltip="tooltip" data-placement="top"
                            title="Edit Pengguna">
                            <i class="fas fa-user-cog"></i>
                        </button>
                        @if ($user->jenis_pegawai != 'admin')
                            <button type="button" class="btn btn-danger btn-xs"
                                onclick="deleteData('{{ route('admin-pengguna.destroy', $user->user_id) }}')"
                                data-tooltip="tooltip" data-placement="top" title="Hapus Pengguna">
                                <i class="fas fa-user-times"></i>
                            </button>
                        @endif
                    </td>
                </tr>
                @include('admin.Pengguna.Addons.edit')
            @endforeach
        </tbody>
    </table>
</div>
{{ $Pengguna->links() }}

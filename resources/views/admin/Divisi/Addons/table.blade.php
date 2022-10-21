<table class="table table-hover table-striped table-borderd">
    <thead>
        <tr>
            <th>#</th>
            <th>Kode Divisi</th>
            <th>Nama Divisi</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Divisi as $divisi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $divisi->kode_divisi }}</td>
                <td>{{ $divisi->nama_divisi }} - ({{ $divisi->alias_divisi}})</td>
                <td>
                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#EditData{{ $loop->iteration }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-xs" onclick="deleteData('{{ route('admin-divisi.destroy', $divisi->divisi_id) }}')">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
            @include('admin.Divisi.Addons.edit')
        @endforeach
    </tbody>
</table>
{{ $Divisi->links() }}

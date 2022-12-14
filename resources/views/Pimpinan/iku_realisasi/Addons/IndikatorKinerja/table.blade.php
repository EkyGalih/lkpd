<table class="table table-hover table-striped table-borderd">
    <thead>
        <tr>
            <th>#</th>
            <th>Indikator Kinerja</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($indikatorKinerja as $ik)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ik->indikator_kinerja }}</td>
                <td>
                    <button type="button" class="btn btn-link btn-xs" data-toggle="modal" data-target="#EditData{{ $loop->iteration }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-link btn-xs" onclick="deleteData('{{ route('iku-indikator-pegawai.destroy', $ik->ik_id) }}')">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
            @include('pegawai.iku_realisasi.Addons.IndikatorKinerja.edit')
        @endforeach
    </tbody>
</table>
{{ $indikatorKinerja->links() }}

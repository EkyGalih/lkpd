<table class="table table-hover table-striped table-bordered table-jadwal">
    <button type="button" class="btn btn-theme btn-md" data-toggle="modal" data-target="#modalAdd"
        style="float: right; margin: 10px;">
        <i class="fas fa-plus"></i> Tambah Jadwal
    </button>

    {{-- MODAL TAMBAH JADWAL --}}
    @include('admin.Schedule.Components.form-add')
    {{-- END MODAL TAMBAH JADWAL --}}

    <thead>
        <tr>
            <th style="text-align: center;">#</th>
            <th style="text-align: center;">Jenis Kegiatan</th>
            <th style="text-align: center;">From</th>
            <th style="text-align: center;">To</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jadwals as $jadwal)
            <tr>
                <td style="text-align: center;">{{ $loop->iteration }}</td>
                <td>
                    <button type="button" class="btn btn-link" data-toggle="modal"
                        data-target="#modalShow{{ $loop->iteration }}" data-tooltip="tooltip"
                        data-placement="top" title="Baca Undangan">
                        {{ $jadwal->jenis_acara }}
                    </button>
                    <sup><a href="#" data-toggle="modal"
                            data-target="#modalEdit{{ $loop->iteration }}" data-tooltip="tooltip"
                            data-placement="top" title="Perbaharui Jadwal"> <i
                                class="fas fa-edit"></i></a></sup>
                </td>
                <td>{{ $jadwal->acara_dari }}</td>
                <td>{{ $jadwal->user->nama }}</td>
            </tr>

            {{-- MODAL SHOW DETAIL UNDANGAN --}}
            @include('admin.Schedule.Components.detail')
            {{-- END MODAL SHOW DETAIL UNDANGAN --}}

            {{-- MODAL EDIT JADWAL --}}
            @include('admin.Schedule.Components.form-edit')
            {{-- END MODAL EDIT JADWAL --}}
        @endforeach
    </tbody>
</table>

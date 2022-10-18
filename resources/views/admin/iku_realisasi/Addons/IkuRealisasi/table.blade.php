<table class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <td>#</td>
            <td>Sasaran Strategis</td>
            <td>Indikator Kinerja</td>
            <td>Penjelasan <br />(Formulasi Pengukuran, Tipe Perhitungan, Sumber Data, Alasan)</td>
            <td>Target</td>
            <td>Target Tercapai</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        @foreach ($IkuRealisasi as $data)
            <tr>
                <td rowspan="4">{{ $loop->iteration }}</td>
                <td rowspan="4">{{ $data->sasaran->sasaran_strategis }}</td>
                <td rowspan="4">{{ $data->IK->indikator_kinerja }}</td>
                <td><strong>Formulasi Pengukuran :</strong> {{ $data->formula->formulasi }}</td>
                <td rowspan="4">{{ $data->target }}%</td>
                <td rowspan="4"><label style="font-size: 13px;" class="label label-{{ $data->target > $data->target_tercapai ? 'danger' : 'success' }}">{{ $data->target_tercapai }}%</label></td>
                <td rowspan="4">
                    <button type="button" class="btn btn-link btn-xs" data-toggle="modal"
                        data-target="#EditData{{ $loop->iteration }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-link btn-xs"
                        onclick="deleteData('{{ route('iku-realisasi.destroy', $data->iku_realisasi_id) }}')">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td><strong>Tipe Penghitungan : </strong>{{ $data->formula->tipe_penghitungan }}</td>
            </tr>
            <tr>
                <td><strong>Sumber Data : </strong>{{ $data->formula->divisi->nama_divisi }}</td>
            </tr>
            <tr>
                <td><strong>Alasan : </strong>{{ $data->formula->alasan }}</td>
            </tr>
            @include('admin.iku_realisasi.Addons.IkuRealisasi.edit')
        @endforeach
    </tbody>
</table>
{{ $IkuRealisasi->links() }}
@section('js-additional')
    <script>
        function enableForm() {
            $('#indikator_kinerja_id').removeAttr('disabled');
        }

        function getData() {
            var id = $('#indikator_kinerja_id').val();
            $.ajax({
                type: 'GET',
                async: true,
                url: '{{ url('api/iku-realisasi/getFormulasi') }}/' + id,
                dataType: 'json',
                success: function(data) {
                    $('#formula_id').val(data.formula_id);
                    $('#formula').val(data.formulasi);
                    $('#tipe_penghitungan').val(data.tipe_penghitungan);
                    $('#divisi_id').val(data.nama_divisi)
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    </script>
@endsection

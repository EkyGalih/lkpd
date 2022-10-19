<h2 style="text-align: center;">PROGRAM ANGGARAN IKU & RKT {{ date('Y') }}<br /> BADAN PENGELOLAAN KEUANGAN DAN ASET
    DAERAH</h2>
<button type="button" class="btn btn-theme btn-sm" data-toggle="modal" data-target="#TambahDataProgram"
    style="float: right; margin-bottom: 5px; margin-right: 40px;">
    <i class="fas fa-plus"></i> Tambah Data
</button>
<br />
<br />
<table border="0">
    <thead>
        <tr>
            <th></th>
            <th
                style="width: 200px; text-align: center; padding: 10px; font-size: 16px; font-family: 'Times New Roman', Times, serif;">
                Program</th>
            <th
                style="width: 200px; text-align: center; padding: 10px; font-size: 16px; font-family: 'Times New Roman', Times, serif;">
                Anggaran</th>
            <th
                style="width: 200px; text-align: center; padding: 10px; font-size: 16px; font-family: 'Times New Roman', Times, serif;">
                Anggaran Terpakai</th>
            <th></th>
            <th
                style="width: 200px; text-align: center; padding: 10px; font-size: 16px; font-family: 'Times New Roman', Times, serif;">
                Persentase</th>
            <th
                style="width: 250px; text-align: center; padding: 10px; font-size: 16px; font-family: 'Times New Roman', Times, serif;">
                Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @php $ProgramAnggaranIku = \App\Models\ProgramAnggaran::getProgramAnggaran() @endphp
        @foreach ($ProgramAnggaranIku as $pai)
            <tr>
                <form action="{{ route('program-anggaran-iku.update', $pai->program_anggaran_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <td style="padding: 10px;">{{ $loop->iteration }}. </td>
                    <td style="padding: 10px;">{{ $pai->program }}</td>
                    <td style="padding: 10px;">Rp. {{ number_format($pai->anggaran) }} <input type="hidden" name="anggaran" value="{{ $pai->anggaran }}"></td>
                    <td style="padding: 10px;"><input type="text" onkeypress="isInputNumber(event)" name="anggaran_terpakai" value="{{ $pai->anggaran_terpakai }}" class="form-control"></td>
                    <td><button type="submit" class="btn btn-success btn-xs" data-tooltip="tooltip"
                            data-placement="top" title="Simpan Perubahan"><i class="fas fa-save"></i></button></td>
                    <td style="padding: 10px; text-align: center;">{{ $pai->persentase_anggaran }} %</td>
                    <td style="padding: 10px;">{{ $pai->keterangan }}</td>
                </form>
            </tr>
        @endforeach
    </tbody>
</table>
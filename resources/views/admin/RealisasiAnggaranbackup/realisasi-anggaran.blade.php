@extends('admin.index')
@section('title', 'Laporan Realisasi Anggaran')

@section('menu-realisasi-anggaran', 'active')

@section('css-additional')
    <link rel="stylesheet" href="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.css') }}">
@endsection
@section('content')
    <h3><a href="{{ route('realisasi-anggaran-admin') }}"><i class="fas fa-cash-register"></i> Laporan Realisasi Anggaran</a>
    </h3>
    <hr />
    <div class="row mt">
        <div class="col-lg-8">
            <div class="content-panel">
                <div class="row">
                    <div class="col-lg-8">
                        <h4 class="title"><i class="fas fa-list"></i> Data Realisasi Anggaran</h4>
                    </div>
                    <div class="col-lg-4">
                        <select id="tahun_anggaran" class="form-control">
                            <option>Pilih Tahun Anggaran</option>
                        </select>
                    </div>
                </div>
                <hr />
                <table class="table table-hover table-striped table-bordered" id="data-table">
                    <thead>
                        <tr>
                            <td style="text-align: center;">Uraian</td>
                            <td style="text-align: center;">Ref</td>
                            <td style="text-align: center;">{{ $tahun1 }}</td>
                            <td style="text-align: center;">{{ $tahun2 }}</td>
                            <td style="text-align: center;"></td>
                        </tr>
                    </thead>
                    @if (!isset($realisasi))
                        <tbody>
                            @php
                                $up_down1 = [];
                                $up_down2 = [];
                            @endphp
                            @foreach ($realisasi as $realisasi)
                                <tr>
                                    <td><strong>{{ $realisasi['jenis_laporan'] }}</strong></td>
                                    <td><strong>{{ $realisasi['ref1'] }}</strong></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 20px;"><strong>Arus Masuk Kas</strong></td>
                                    <td><strong>{{ $realisasi['ref_arus_masuk'] }}</strong></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @foreach ($realisasi['jenis_arus_kas']['arus_masuk'] as $arus_masuk)
                                    <tr>
                                        <td style="padding-left: 40px">{{ $arus_masuk['uraian'] }}</td>
                                        <td><strong>{{ $arus_masuk['ref3'] }}</strong></td>
                                        <td>{{ number_format(floatval($arus_masuk['anggaran']), 2) }}</td>
                                        <td>{{ number_format(floatval($arus_masuk['anggaran_tahun_sebelum']), 2) }}</td>
                                        <td>
                                            <a href="{{ route('arus-kas-admin.index', $arus_masuk['arus_kas_id']) }}"
                                                class="btn btn-warning btn-xs" data-tooltip="tooltip" data-placement="top"
                                                title="Edit Uraian">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a type="button" class="btn btn-danger btn-xs" data-tooltip="tooltip"
                                                data-placement="top" title="Hapus Uraian"
                                                onclick="deleteData('{{ route('arus-kas-admin.destroy', $arus_masuk['arus_kas_id']) }}')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td style="padding-left: 60px;"><strong>Jumlah Arus Masuk Kas</strong></td>
                                    <td></td>
                                    <td>
                                        @php $sub_total_masuk1 = App\Models\ArusKas::getSubTotal1($arus_masuk['ref1'], $arus_masuk['ref2'], $arus_masuk['tahun_anggaran'], $arus_masuk['jenis_laporan'], $arus_masuk['jenis_arus_kas']) @endphp
                                        <strong>{{ number_format(floatval($sub_total_masuk1), 2) }}</strong>
                                    </td>
                                    <td>
                                        @php $sub_total_masuk2 = App\Models\ArusKas::getSubTotal2($arus_masuk['ref1'], $arus_masuk['ref2'], $arus_masuk['tahun_anggaran_sebelum'], $arus_masuk['jenis_laporan'], $arus_masuk['jenis_arus_kas']) @endphp
                                        <strong>{{ number_format(floatval($sub_total_masuk2), 2) }}</strong>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 20px;"><strong>Arus Keluar Kas</strong></td>
                                    <td><strong>{{ $realisasi['ref_arus_keluar'] }}</strong></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @foreach ($realisasi['jenis_arus_kas']['arus_keluar'] as $arus_keluar)
                                    <tr>
                                        <td style="padding-left: 40px;">{{ $arus_keluar['uraian'] }}</td>
                                        <td><strong>{{ $arus_keluar['ref3'] }}</strong></td>
                                        <td>{{ number_format(floatval($arus_keluar['anggaran']), 2) }}</td>
                                        <td>{{ number_format(floatval($arus_keluar['anggaran_tahun_sebelum']), 2) }}</td>
                                        <td>
                                            <a href="{{ route('arus-kas-admin.index', $arus_keluar['arus_kas_id']) }}"
                                                class="btn btn-warning btn-xs" data-tooltip="tooltip" data-placement="top"
                                                title="Edit Uraian">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a type="button" class="btn btn-danger btn-xs" data-tooltip="tooltip"
                                                data-placement="top" title="Hapus Uraian"
                                                onclick="deleteData('{{ route('arus-kas-admin.destroy', $arus_keluar['arus_kas_id']) }}')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td style="padding-left: 60px;"><strong>Jumlah Arus Keluar Kas</strong></td>
                                    <td></td>
                                    <td>
                                        @php $sub_total_keluar1 = App\Models\ArusKas::getSubTotal1($arus_keluar['ref1'], $arus_keluar['ref2'], $arus_keluar['tahun_anggaran'], $arus_keluar['jenis_laporan'], $arus_keluar['jenis_arus_kas']) @endphp
                                        <strong>{{ number_format(floatval($sub_total_keluar1), 2) }}</strong>
                                    </td>
                                    <td>
                                        @php $sub_total_keluar2 = App\Models\ArusKas::getSubTotal2($arus_keluar['ref1'], $arus_keluar['ref2'], $arus_keluar['tahun_anggaran_sebelum'], $arus_keluar['jenis_laporan'], $arus_keluar['jenis_arus_kas']) @endphp
                                        <strong>{{ number_format(floatval($sub_total_keluar2), 2) }}</strong>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    @php
                                        $explode = explode(' ', $arus_kas['jenis_laporan']);
                                        $insert = 'bersih';
                                        array_splice($explode, 2, 0, $insert);
                                        $implode = implode(' ', $explode);
                                    @endphp
                                    <td style="padding-left: 80px;"><strong>{{ $implode }}</strong></td>
                                    <td></td>
                                    <td>
                                        {{-- hitung rata-rata besih  --}}
                                        @php
                                            $arus_kas_bersih1 = $sub_total_masuk1 - $sub_total_keluar1;
                                            array_push($up_down1, $arus_kas_bersih1);
                                        @endphp
                                        <strong>{{ number_format(floatval($sub_total_masuk1 - $sub_total_keluar1), 2) }}</strong>
                                    </td>
                                    <td>
                                        {{-- hitung rata-rata besih  --}}
                                        @php
                                            $arus_kas_bersih2 = $sub_total_masuk2 - $sub_total_keluar2;
                                            array_push($up_down2, $arus_kas_bersih2);
                                        @endphp
                                        <strong>{{ number_format(floatval($sub_total_masuk2 - $sub_total_keluar2), 2) }}</strong>
                                    </td>
                                    <td></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td><strong>Kenaikan/Penurunan Kas</strong></td>
                                <td><strong>5.5.5</strong></td>
                                <td>
                                    @php
                                        $up_down_total1 = array_sum($up_down1);
                                    @endphp
                                    <strong>({{ number_format(floatval($up_down_total1), 2) }})</strong>
                                </td>
                                <td>
                                    @php
                                        $up_down_total2 = array_sum($up_down2);
                                    @endphp
                                    <strong>{{ number_format(floatval($up_down_total2), 2) }}</strong>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><strong>Saldo Awal Kas di BUD dan Bendahara Pengeluaran + BLUD + Penerima + Kas
                                        BOS</strong></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><strong>Saldo Akhir Kas di BUD dan Bendahara Pengeluaran + BLUD + Penerima + Kas
                                        BOS</strong></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><strong>Saldo Akhir Kas di Bendahara Pengeluaran</strong></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><strong>Saldo Akhir Kas di Bendahara Penerimaan</strong></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><strong>Saldo Akhir Kas Lainnya</strong></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><strong>Saldo Akhir Kas di Badan Layanan Umum Daerah</strong></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><strong>Saldo Kas di Bendahara Dana BOS</strong></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><strong>Koreksi Kas Bendahara Pengeluaran</strong></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><strong>Saldo Akhir Kas</strong></td>
                                <td><strong>5.5.6</strong></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    @else
                        <tbody>
                            <tr>
                                <td colspan="5" style="text-align: center;">Tidak Ada Data Realisasi Anggaran</td>
                            </tr>
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="content-panel">

                <!-- tombol tambah dan import -->
                <div class="row">
                    <div class="col-lg-6">
                        <h4><i class="fas fa-{{ isset($edit) ? 'edit' : 'plus' }}"></i>
                            {{ isset($edit) ? 'Edit' : 'Tambah' }} Arus Kas</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="btn-group pull-right" style="margin-right: 10px;">
                            <button type="button" data-toggle="modal" data-target="#ArusKas"
                                class="btn btn-success btn-md">
                                <i class="fas fa-file-excel"></i>
                                <span>Import Data</span>
                            </button>
                        </div>

                        <!-- modal import -->
                        <div class="modal fade" id="ArusKas" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content" style="margin-top: 14%;">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Import Data Arus Kas</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('arus-kas-admin.import') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <span class="btn btn-theme02 btn-file">
                                                    <span class="fileupload-new"><i class="fas fa-paperclip"></i> Pilih
                                                        File</span>
                                                    <span class="fileupload-exists"><i class="fas fa-undo"></i> Ubah</span>
                                                    <input type="file" class="default" name="data-arus-kas">
                                                </span>
                                                <span class="fileupload-preview" style="margin-left: 5px;"></span>
                                                <a href="#" class="close fileupload-exists"
                                                    data-dismiss="fileupload" style="float: none; margin-left: 5px;"></a>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-theme04"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-theme">Import</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <hr />
                <form method="POST"
                    action="{{ isset($edit) ? route('arus-kas-admin.update', $edit->arus_kas_id) : route('arus-kas-admin.store') }}"
                    style="margin-left: 10px; margin-right: 10px;">
                    @csrf
                    @if (isset($edit))
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="get_ref1">Jenis Realisasi Anggaran</label>
                                <select name="get_ref1" class="form-control" onchange="getRef1()" id="get_ref1">
                                    <option>Pilih</option>
                                    @if (isset($kodeRekening))
                                        @foreach ($kodeRekening as $item)
                                            <option value="{{ $item->rekening_id }}">{{ $item->nama_rekening }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <input type="hidden" name="jenis_laporan" id="jenis_laporan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ref">Kode Rekening</label>
                                <input type="text" name="ref1" class="form-control" readonly id="ref1"
                                    value="{{ isset($edit) ? $edit->ref1 : '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="get_ref2">Jenis Uraian</label>
                                <select name="get_ref2" class="form-control" id="get_ref2" onchange="getRef2()">
                                    <option>Pilih</option>
                                </select>
                                <input type="hidden" name="jenis_arus_kas" id="jenis_arus_kas">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ref2">Kode Rekening</label>
                                <input type="text" name="ref2" class="form-control" id="ref2" readonly
                                    value="{{ isset($edit) ? $edit->ref2 : '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="uraian">Uraian</label>
                                <input type="text" name="uraian" class="form-control"
                                    value="{{ isset($edit) ? $edit->uraian : '' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ref">Kode Rekening</label>
                                <input type="text" name="ref3" class="form-control"
                                    value="{{ isset($edit) ? $edit->ref3 : '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tahun_anggaran1">Tahun Anggaran</label>
                                <input type="text" name="tahun_anggaran1" class="form-control" onchange="getTahun()"
                                    id="tahun_anggaran1" value="{{ isset($edit) ? $edit->tahun_anggaran : '' }}"
                                    onkeypress="isInputNumber(event)">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="anggaran" id="anggaran">Anggaran</label>
                                <input type="text" name="anggaran" id="anggaran" class="form-control"
                                    value="{{ isset($edit) ? $edit->anggaran : '' }}" onchange="subTotal1()">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="realisasi_anggaran" id="realisasi_anggaran">Realisasi Anggaran</label>
                                <input type="text" name="realisasi_anggaran" id="realisasi_anggaran"
                                    class="form-control" value="{{ isset($edit) ? $edit->anggaran : '' }}"
                                    onchange="subTotal1()">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tahun_anggaran">Persentase (%)</label>
                                <input type="text" name="persen" class="form-control"
                                    value="{{ isset($edit) ? $edit->tahun_anggaran_sebelum : '' }}" id="persen"
                                    onkeypress="isInputNumber(event)">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="realisasi_anggaran2" id="realisasi_anggaran2">Realisasi Anggaran</label>
                                <input type="text" name="anggaran_tahun_sebelum" id="realisasi_anggaran2"
                                    class="form-control" value="{{ isset($edit) ? $edit->anggaran_tahun_sebelum : '' }}"
                                    onchange="subTotal2()">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sub_total_saldo" id="sub_total_1">Sub Total SILPA </label>
                                <input type="text" name="sub_total_saldo1"
                                    value="{{ isset($edit) ? $edit->sub_total_saldo1 : '' }}" class="form-control"
                                    id="sub_total_value_1" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="total_saldo" id="sub_total_2">Sub Total SILPA </label>
                                <input type="text" name="sub_total_saldo2" id="sub_total_value_2"
                                    value="{{ isset($edit) ? $edit->sub_total_saldo2 : '' }}" class="form-control"
                                    readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sub_total_saldo" id="total_1">Total SILPA </label>
                                <input type="text" name="total_saldo1" id="total_value_1" class="form-control"
                                    value="{{ isset($edit) ? $edit->total_saldo1 : '' }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="total_saldo" id="total_2">Total SILPA </label>
                                <input type="text" name="total_saldo2" id="total_value_2" class="form-control"
                                    value="{{ isset($edit) ? $edit->total_saldo2 : '' }}" readonly>
                            </div>
                        </div>
                        <div class="form-group" style="margin-right: 10px;">

                            <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                            <input type="hidden" name="status_laporan" value="unaudited">

                            <div class="btn-group pull-right">
                                @if (isset($edit))
                                    <a href="{{ route('arus-kas-admin.index') }}" class="btn btn-danger btn-md">
                                        <i class="fas fa-sync"></i>
                                        <span>Reset Form</span>
                                    </a>
                                @endif
                                <button type="submit" class="btn btn-theme btn-md">
                                    <i class="fas fa-save"></i>
                                    <span>Simpan</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js-additional')
    <script src="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>
    <script>
        function getRef1() {
            var ref1 = $('#get_ref1').val();
            $.ajax({
                type: 'GET',
                async: true,
                url: '{{ url('api/kode-rekening/getRefRekening') }}/' + ref1,
                dataType: 'json',
                success: function(data) {
                    $('#ref1').val(data.kode_rekening);
                    $('#jenis_laporan').val(data.nama_rekening);
                },
                error: function(error) {
                    console.log(error);
                }
            });
            $.ajax({
                type: 'GET',
                async: true,
                url: '{{ url('api/kode-rekening/getRefGroup') }}/' + ref1,
                dataType: 'json',
                success: function(data) {
                    var addOption = "";

                    for (a = 0; a < data.length; a++) {
                        addOption += ["<option value='" + data[a].rekening_id + "'>" + data[a].nama_rekening +
                            "</option>"
                        ];
                    }
                    $('#get_ref2').html("Pilih");
                    $('#get_ref2').append(addOption);
                    $('#ref2').val(data[0].kode_rekening);
                    $('#jenis_arus_kas').val(data[0].nama_rekening);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function getRef2() {
            var ref2 = $('#get_ref2').val();
            $.ajax({
                type: 'GET',
                async: true,
                url: '{{ url('api/kode-rekening/getRefSub') }}/' + ref2,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#ref2').val(data.kode_rekening);
                    $('#jenis_arus_kas').val(data.nama_rekening);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function subTotal1() {
            var ref1 = $('#ref1').val();
            var ref2 = $('#ref2').val();
            var tahun = $('#tahun_anggaran1').val();
            var anggaran = $('#anggaran').val();

            $.ajax({
                type: 'GET',
                async: true,
                url: '{{ url('api/arus-kas/subTotal1') }}/' + ref1 + '/' + ref2 + '/' + tahun,
                success: function(data) {
                    var subTotal = (parseFloat(data) + parseInt(anggaran));
                    $('#sub_total_value_1').val(subTotal);
                },
                error: function(error) {
                    console.log(error);
                }
            });

            $.ajax({
                type: 'GET',
                async: true,
                url: '{{ url('api/arus-kas/Total1') }}/' + tahun,
                success: function(data) {
                    var total = parseInt(anggaran) + parseFloat(data);
                    $('#total_value_1').val(total);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function subTotal2() {
            var ref1 = $('#ref1').val();
            var ref2 = $('#ref2').val();
            var tahun = $('#tahun_anggaran2').val();
            var anggaran = $('#anggaran_sebelum').val();

            $.ajax({
                type: 'GET',
                async: true,
                url: '{{ url('api/arus-kas/subTotal2') }}/' + ref1 + '/' + ref2 + '/' + tahun,
                success: function(data) {
                    var subTotal = (parseFloat(data) + parseInt(anggaran));
                    $('#sub_total_value_2').val(subTotal);
                },
                error: function(error) {
                    console.log(error);
                }
            });

            $.ajax({
                type: 'GET',
                async: true,
                url: '{{ url('api/arus-kas/Total2') }}/' + tahun,
                success: function(data) {
                    var total = (parseInt(anggaran) + parseFloat(data));
                    $('#total_value_2').val(total);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function getTahun() {
            tahun = $('#tahun_anggaran1').val();
            tahun2 = tahun - 1;
            $('#sub_total_1').text('Sub Total SILPA ' + tahun);
            $('#total_1').text('Total SILPA ' + tahun);
            $('#anggaran').text('Anggaran ' + tahun);
            $('#realisasi_anggaran').text('Realisasi Anggaran ' + tahun);

            $('#sub_total_2').text('Sub Total SILPA ' + tahun2);
            $('#total_2').text('Total SILPA ' + tahun2);
            $('#realisasi_anggaran2').text('Realisasi Anggaran ' + tahun2);
        }
    </script>
@endsection

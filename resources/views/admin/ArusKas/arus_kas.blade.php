@extends('admin.index')
@section('title', 'Laporan Arus Kas')

@section('menu-laporan', 'active')
@section('show-menu-laporan', 'show')
@section('arus-kas', 'active')

@section('css-additional')
<link rel="stylesheet" href="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.css') }}">
@endsection
@section('content')
<h3><a href="{{ route('arus-kas-admin.index') }}"><i class="fas fa-cash-register"></i> Laporan Arus Kas</a></h3>
<hr/>
<div class="row mt">
    <div class="col-lg-8">
        <div class="content-panel">
            <div class="row">
                <div class="col-lg-7">
                    <h4 class="title"><i class="fas fa-list"></i> Data Arus Kas {{ $tahun1 != null ? ' / Tahun ' .$tahun1 : '' }}</h4>
                </div>
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tahun_anggaran">Pilih Tahun</label>
                                <select id="tahun_anggaran" class="form-control" onchange="FilterArusKas()">
                                    <option value="">Pilih Tahun</option>
                                    @foreach ($tahun as $tahun)
                                    <option value="{{ $tahun->tahun_anggaran }}" {{ $tahun->tahun_anggaran == $TahunAnggaran ? 'selected' : '' }}>{{ $tahun->tahun_anggaran }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bulan_anggaran">Pilih Bulan</label>
                                <select id="bulan_anggaran" class="form-control" onchange="FilterArusKas()">
                                    <option value="">Pilih Bulan</option>
                                    @foreach ($bulans as $item)
                                    <option value="{{ $item }}" {{ $item == $get_bulan ? 'selected' : '' }}>{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="btn-group">
                                <a href="{{ route('arus-kas-admin.export', $tahun1, $get_bulan) }}" class="btn btn-theme03 btn-md" data-tooltip="tooltip" data-placement="top" title="Download Format Excel" style="margin-top: 22px;">
                                    <i class="fas fa-file-excel"></i>
                                </a>
                                <a href="{{ route('arus-kas-admin.export', $tahun1, $get_bulan) }}" class="btn btn-theme05 btn-md" data-tooltip="tooltip" data-placement="top" title="Download Format Pdf" style="margin-top: 22px;">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            <table class="table table-hover table-striped table-bordered auto">
                <thead>
                    <tr>
                        <td style="text-align: center;">Uraian</td>
                        <td style="text-align: center;">Ref</td>
                        <td style="text-align: center;">{{ $tahun1 }}</td>
                        @if ($get_bulan != null)
                        <td id="bulan_anggaran">Bulan (<strong>{{ isset($get_bulan) ? $get_bulan : '-' }}</strong>)</td>
                        <td id="minggu1">Minggu ke-1</td>
                        <td id="minggu2">Minggu Ke-2</td>
                        <td id="minggu3">Minggu ke-3</td>
                        <td id="minggu4">Minggu ke-4</td>
                        @endif
                        <td style="text-align: center;">{{ $tahun2 }}</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $_totalActA = [];
                    $_totalActB = [];
                    @endphp
                    @foreach ($arus_kas as $arus_kas)
                    @php
                    $arus_masuk = $arus_kas['jenis_arus_kas']['arus_masuk'];
                    $arus_keluar = $arus_kas['jenis_arus_kas']['arus_keluar'];
                    @endphp
                    <tr>
                        <td><strong>{{ $arus_kas['jenis_laporan'] }}</strong></td>
                        <td><strong>{{ $arus_kas['ref1'] }}</strong></td>
                        <td colspan="{{ $get_bulan != null ? '6' : '0' }}"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"><strong>Arus Masuk Kas</strong></td>
                        <td><strong>{{ $arus_kas['ref_arus_masuk'] }}</strong></td>
                        <td colspan="{{ $get_bulan != null ? '6' : '0' }}"></td>
                        <td></td>
                    </tr>
                    @foreach ($arus_masuk as $arus_masuk)
                    <tr>
                        <td style="padding-left: 40px">{{ $arus_masuk['uraian'] }}</td>
                        <td><strong>{{ $arus_masuk['ref3'] }}</strong></td>
                        <td>{{ number_format(floatval($arus_masuk['anggaran']),2) }}</td>
                        @if ($get_bulan != null)
                        @php $totalMounth = $get_bulan != null ? App\Models\TotalSaldo::getSubTotalBulan($arus_masuk['kode_unik'], $TahunAnggaran, $arus_masuk['ref2'],$get_bulan) : null @endphp
                        @if ($totalMounth != null)
                        <td id="bulan_anggaran">
                            {{ $totalMounth != null ? number_format($totalMounth,2) : '-' }}
                        </td>
                        @else
                        <td colspan="5"></td>
                        @endif
                        @php
                        $weeks = $get_bulan != null ? App\Models\TotalSaldo::getSubTotalBulanWeek($arus_masuk['kode_unik'], $TahunAnggaran, $arus_masuk['ref2'],$get_bulan) : null;
                        $count1 = $weeks == null ? '0' : count($weeks);
                        @endphp
                        @if ($weeks != null)
                        @foreach ($weeks as $week)
                        <td>
                            <a href="#" data-toggle="modal" data-target="#EditOrHapus{{ $loop->iteration }}">{{ $week == null ? '-' : number_format($week->sub_total,2) }}</a>
                            <!-- Modal Edit or Hapus -->
                            <div class="modal fade" id="EditOrHapus{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm" style="margin-top: 14%;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="modal-title" id="EditOrHapus">Pilih Aksi</h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <button style="float: right;" type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <center>
                                                <div class="btn-group">
                                                    <a href="{{ route('arus-kas-admin.edit', $week->weeks_id) }}" class="btn btn-warning btn-sm" data-tooltip="tooltip" data-placement="left" title="Edit Anggaran Kas Mingguan">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <button data-tooltip="tooltip" data-placement="right" title="Hapus Anggaran Kas Mingguan" type="button" class="btn btn-danger btn-sm" onclick="deleteData('{{ route('arus-kas-admin.destroyTotalSaldo', $week->weeks_id) }}')">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        @endforeach
                        @if ($count1 == 1)
                        <td colspan="3"></td>
                        @elseif ($count1 == 2)
                        <td colspan="2"></td>
                        @elseif ($count1 == 2)
                        <td></td>
                        @endif
                        @endif
                        @endif
                        <td>
                            @php $_anggaranMasukB = isset($tahun2) ? App\Models\ArusKas::subTotalMasuk($arus_masuk['ref2'], $tahun2) : null @endphp
                            {{ isset($_anggaranMasukB) ? number_format($_anggaranMasukB->anggaran,2) : '0' }}
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td style="padding-left: 60px;"><strong>Jumlah Arus Masuk Kas</strong></td>
                        <td>-</td>
                        <td colspan="{{ $get_bulan != null ? '6' : '0' }}">
                            @php
                            $_subTotalMasukA = isset($tahun1) ? App\Models\TotalSaldo::getSubTotal($arus_masuk['kode_unik'], $arus_masuk['ref2'], $tahun1) : '0';
                            array_push($_totalActA, $_subTotalMasukA)
                            @endphp
                            <strong>{{ isset($_subTotalMasukA) ? number_format($_subTotalMasukA,2) : '0' }}</strong>
                        </td>
                        <td>
                            @php $_subTotalMasukB = isset($tahun2) ? App\Models\ArusKas::getSubTotal($arus_masuk['ref2'], $tahun2) : '0' @endphp
                            <strong>{{ isset($_subTotalMasukB) ? number_format($_subTotalMasukB,2) : '0' }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"><strong>Arus Keluar Kas</strong></td>
                        <td><strong>{{ $arus_kas['ref_arus_keluar'] }}</strong></td>
                        <td colspan="{{ $get_bulan != null ? '6' : '0' }}"></td>
                        <td></td>
                    </tr>
                    @foreach ($arus_keluar as $arus_keluar)
                    <tr>
                        <td style="padding-left: 40px;">{{ $arus_keluar['uraian'] }}</td>
                        <td><strong>{{ $arus_keluar['ref3'] }}</strong></td>
                        <td>{{ number_format(floatval($arus_keluar['anggaran']),2) }}</td>
                        @if ($get_bulan != null)
                        @php $totalMounth = $get_bulan != null ? App\Models\TotalSaldo::getSubTotalBulan($arus_keluar['kode_unik'], $TahunAnggaran, $arus_keluar['ref2'],$get_bulan) : null @endphp
                        @if ($totalMounth != null)
                        <td id="bulan_anggaran">
                            {{ $totalMounth != null ? number_format($totalMounth,2) : '-' }}
                        </td>
                        @else
                        <td colspan="5"></td>
                        @endif
                        @php
                        $weeks = $get_bulan != null ? App\Models\TotalSaldo::getSubTotalBulanWeek($arus_keluar['kode_unik'], $TahunAnggaran, $arus_keluar['ref2'],$get_bulan) : null;
                        $count2 = $weeks == null ? '0' : count($weeks);
                        @endphp
                        @if ($weeks != null)
                        @foreach ($weeks as $week)
                        <td>
                            <a href="#" data-toggle="modal" data-target="#EditOrHapus{{ $loop->iteration }}">{{ $week == null ? '-' : number_format($week->sub_total,2) }}</a>
                            <!-- Modal Edit or Hapus -->
                            <div class="modal fade" id="EditOrHapus{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm" style="margin-top: 14%;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="modal-title" id="EditOrHapus">Pilih Aksi</h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <button style="float: right;" type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <center>
                                                <div class="btn-group">
                                                    <a href="{{ route('arus-kas-admin.edit', $week->weeks_id) }}" class="btn btn-warning btn-sm" data-tooltip="tooltip" data-placement="left" title="Edit Anggaran Kas Mingguan">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <button data-tooltip="tooltip" data-placement="right" title="Hapus Anggaran Kas Mingguan" type="button" class="btn btn-danger btn-sm" onclick="deleteData('{{ route('arus-kas-admin.destroyTotalSaldo', $week->weeks_id) }}')">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        @endforeach
                        @if ($count2 == 1)
                        <td colspan="3"></td>
                        @elseif ($count2 == 2)
                        <td colspan="2"></td>
                        @elseif ($count2 == 3)
                        <td colspan="1"></td>
                        @endif
                        @endif
                        @endif
                        <td>
                            {{ isset($_anggaranB) ? number_format($_anggaranB->sub_total) : '0' }}
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td style="padding-left: 60px;"><strong>Jumlah Arus Keluar Kas</strong></td>
                        <td>-</td>
                        <td colspan="{{ $get_bulan != null ? '6' : '0' }}">
                            @if ($arus_keluar == null)
                            @php $_subTotalKeluarA = 0 @endphp
                            0.00
                            @else
                            @php
                            $_subTotalKeluarA = isset($tahun1) ? App\Models\TotalSaldo::getSubTotal($arus_keluar['kode_unik'], $arus_keluar['ref2'], $TahunAnggaran) : '-';
                            array_push($_totalActA, $_subTotalKeluarA)
                            @endphp
                            {{-- {{ dd($_subTotalKeluarA) }} --}}
                            <strong>{{ number_format($_subTotalKeluarA,2) }}</strong>
                            @endif
                        </td>
                        <td>
                            @if ($arus_keluar == null)
                            @php $_subTotalKeluarB = 0 @endphp
                            0.00
                            @else
                            @php
                            $_subTotalKeluarB = isset($tahun2) ? App\Models\ArusKas::getSubTotal($arus_keluar['ref2'], $tahun2) : '0';
                            array_push($_totalActB, $_subTotalKeluarB)
                            @endphp
                            <strong>{{ number_format($_subTotalKeluarB,2) }}</strong>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        @php
                        $explode = explode(" ",$arus_kas['jenis_laporan']);
                        $insert = "bersih";
                        array_splice($explode, 2, 0 , $insert);
                        $implode = implode(" ", $explode);
                        @endphp
                        <td style="padding-left: 80px;"><strong>{{ $implode }}</strong></td>
                        <td></td>
                        <td colspan="{{ $get_bulan != null ? '6' : '0' }}">
                            {{-- hitung rata-rata besih  --}}
                            @php
                            $kas_bersih1 = ($_subTotalMasukA - $_subTotalKeluarA);
                            @endphp
                            {{ number_format($kas_bersih1,2) }}
                        </td>
                        <td>
                            {{-- hitung rata-rata besih  --}}
                            @php
                            $kas_bersih2 = ($_subTotalMasukB != null ? $_subTotalMasukB : 0) - ($_subTotalKeluarB != null ? $_subTotalKeluarB : 0);
                            @endphp
                            {{ number_format($kas_bersih2,2) }}
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td><strong>Kenaikan/Penurunan Kas</strong></td>
                        <td><strong>5.5.5</strong></td>
                        <td colspan="{{ $get_bulan != null ? '6' : '0' }}">
                            @php
                            $totalA = array_sum($_totalActA);
                            @endphp
                            <strong>({{ number_format(floatval($totalA),2) }})</strong>
                        </td>
                        <td>
                            @php
                            $totalB = array_sum($_totalActB);
                            @endphp
                            <strong>{{ number_format(floatval($totalB),2) }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Saldo Awal Kas di BUD dan Bendahara Pengeluaran + BLUD + Penerima + Kas BOS</strong></td>
                        <td></td>
                        <td colspan="{{ $get_bulan != null ? '6' : '0' }}"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><strong>Saldo Akhir Kas di BUD dan Bendahara Pengeluaran + BLUD + Penerima + Kas BOS</strong></td>
                        <td></td>
                        <td colspan="{{ $get_bulan != null ? '6' : '0' }}"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><strong>Saldo Akhir Kas di Bendahara Pengeluaran</strong></td>
                        <td></td>
                        <td colspan="{{ $get_bulan != null ? '6' : '0' }}"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><strong>Saldo Akhir Kas di Bendahara Penerimaan</strong></td>
                        <td></td>
                        <td colspan="{{ $get_bulan != null ? '6' : '0' }}"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><strong>Saldo Akhir Kas Lainnya</strong></td>
                        <td></td>
                        <td colspan="{{ $get_bulan != null ? '6' : '0' }}"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><strong>Saldo Akhir Kas di Badan Layanan Umum Daerah</strong></td>
                        <td></td>
                        <td colspan="{{ $get_bulan != null ? '6' : '0' }}"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><strong>Saldo Kas di Bendahara Dana BOS</strong></td>
                        <td></td>
                        <td colspan="{{ $get_bulan != null ? '6' : '0' }}"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><strong>Koreksi Kas Bendahara Pengeluaran</strong></td>
                        <td></td>
                        <td colspan="{{ $get_bulan != null ? '6' : '0' }}"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><strong>Saldo Akhir Kas</strong></td>
                        <td><strong>5.5.6</strong></td>
                        <td colspan="{{ $get_bulan != null ? '6' : '0' }}"></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="content-panel">

            <!-- tombol tambah dan import -->
            <div class="row">
                <div class="col-lg-6">
                    <h4><i class="fas fa-{{ isset($edit) ? 'edit' : 'plus' }}"></i> {{ isset($edit) ? 'Edit' : 'Tambah' }} Arus Kas</h4>
                </div>
                <div class="col-lg-6">
                    <div class="btn-group pull-right" style="margin-right: 10px;">
                        <button type="button" data-toggle="modal" data-target="#ArusKas" class="btn btn-success btn-md">
                            <i class="fas fa-file-excel"></i>
                            <span>Import Data</span>
                        </button>
                    </div>

                    <!-- modal import -->
                    <div class="modal fade" id="ArusKas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="margin-top: 14%;">
                                <div class="modal-header">
                                    <h5 class="modal-title">Import Data Arus Kas</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('arus-kas-admin.import') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <span class="btn btn-theme02 btn-file">
                                                <span class="fileupload-new"><i class="fas fa-paperclip"></i> Pilih File</span>
                                                <span class="fileupload-exists"><i class="fas fa-undo"></i> Ubah</span>
                                                <input type="file" class="default" name="data-arus-kas">
                                            </span>
                                            <span class="fileupload-preview" style="margin-left: 5px;"></span>
                                            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left: 5px;"></a>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-theme04" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-theme">Import</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <hr/>
            <form method="POST" action="{{ isset($edit) ? route('arus-kas-admin.update', $edit->total_saldo_id) : route('arus-kas-admin.store') }}" style="margin-left: 10px; margin-right: 10px;">
                @csrf
                @if (isset($edit))
                @method('PUT')
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="get_ref1">Aktifitas Arus Kas</label>
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
                            <input type="text" name="ref1" class="form-control" readonly id="ref1" value="{{ isset($edit) ? $edit->ref1 : '' }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="get_ref2">Jenis Arus Kas</label>
                            <select name="get_ref2" class="form-control" id="get_ref2" onchange="getRef2()">
                                <option>Pilih</option>
                            </select>
                            <input type="hidden" name="jenis_arus_kas" id="jenis_arus_kas">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ref2">Kode Rekening</label>
                            <input type="text" name="ref2" class="form-control" id="ref2" readonly value="{{ isset($edit) ? $edit->ref2 : '' }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="uraian">Uraian</label>
                            <input type="text" name="uraian" class="form-control" value="{{ isset($edit) ? $edit->uraian : '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ref">Kode Rekening</label>
                            <input type="text" name="ref3" class="form-control" value="{{ isset($edit) ? $edit->ref3 : '' }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tahun_anggaran">Tahun Anggaran</label>
                            <input type="text" name="tahun_anggaran" class="form-control" onchange="getTahun()" id="tahun_anggaran1" value="{{ isset($edit) ? $edit->tahun_anggaran : '' }}" onkeypress="isInputNumber(event)">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="bulan">Bulan <sup>(opsi)</sup></label>
                            <select name="bulan" id="bulan_anggaran" class="form-control">
                                <option value="">Pilih Bulan</option>
                                @if (isset($edit))
                                @foreach ($bulans as $bulan)
                                <option value="{{ $bulan }}" {{ $bulan == $get_bulan ? 'selected' : '' }}>{{ $bulan }}</option>
                                @endforeach
                                @else
                                @foreach ($bulans as $bulan)
                                <option value="{{ $bulan }}">{{ $bulan }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="bulan">Minggu <sup>(opsi)</sup></label>
                            <select name="minggu" id="minggu_anggaran" class="form-control">
                                <option value="">Pilih Minggu</option>
                                <option value="1" {{ $get_minggu == '1' ? 'selected' : '' }}>Minggu ke-1</option>
                                <option value="2" {{ $get_minggu == '2' ? 'selected' : '' }}>Minggu ke-2</option>
                                <option value="3" {{ $get_minggu == '3' ? 'selected' : '' }}>Minggu ke-3</option>
                                <option value="4" {{ $get_minggu == '4' ? 'selected' : '' }}>Minggu ke-4</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="anggaran" id="label_anggaran">Anggaran</label>
                            <input type="text" name="anggaran" id="anggaran" class="form-control" value="{{ isset($edit) ? $edit->sub_total : '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="debet" id="label_debet">Debet</label>
                            <input type="text" name="debet" id="debet" class="form-control" value="{{ isset($edit) ? $edit->debet : '' }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kredit" id="label_kredit">Kredit </label>
                            <input type="text" name="kredit" value="{{ isset($edit) ? $edit->kredit : '' }}" class="form-control" id="kredit"  onchange="subTotal()">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="total" id="label_total">Total </label>
                            <input type="text" name="total" id="total" value="{{ isset($edit) ? $edit->sub_total_saldo2 : '' }}" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p id="sub_total_saldo"></p>
                    </div>
                    <div class="col-md-6">
                        <p id="total_saldo"></p>
                    </div>
                </div>
                <div class="row">
                    <input type="hidden" name="status_laporan" value="unaudited">
                    <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                    <div class="form-group pull-right" style="margin-right: 15px;">
                        @if (isset($edit))
                        <a href="{{ route('arus-kas-admin.index') }}" class="btn btn-danger btn-sm">
                            <i class="fas fa-sync"></i> Reset Form
                        </a>
                        @endif
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fas fa-{{ isset($edit) ? 'save' : 'plus-square' }}"></i> {{ isset($edit) ? 'Simpan' : 'Tambah' }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js-additional')
<script src="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>
@include('layouts.admin.Script.arus-kas-config')
@endsection

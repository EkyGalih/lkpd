<div class="content-panel">
    <div class="row">
        <div class="col-lg-8">
            <h4 class="title"><i class="fas fa-list"></i> APBD {{ $tahun_anggaran }}</h4>
        </div>
        <div class="col-lg-3">
            <select id="tahun_anggaran" class="form-control" onchange="getApbd()">
                <option>Pilih Tahun Anggaran</option>
                @foreach ($get_tahun as $ta)
                    <option value="{{ $ta->tahun_anggaran }}"
                        {{ $tahun_anggaran == $ta->tahun_anggaran ? 'selected' : '' }}>{{ $ta->tahun_anggaran }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-1">
            <button type="button" class="btn btn-success" data-tooltip="tooltip" data-placement="top"
                title="Download Data" data-toggle="modal" data-target="#modalImport">
                <i class="fas fa-file-excel"></i>
            </button>
            <div type="button" class="btn btn-theme" data-tooltip="tooltip" data-placement="bottom" title="Tambah Data"
                data-toggle="modal" data-target="#modalAdd">
                <i class="fas fa-plus"></i>
            </div>
        </div>
        <input type="hidden" value="{{ $get_tahun == null ? date('Y') : $tahun_anggaran }}" id="get_ta">
    </div>
    <hr />
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered" id="apbd-table">
            <thead>
                <tr>
                    <td style="text-align: center;" rowspan="2">Kode</td>
                    <td style="text-align: center;" rowspan="2">Uraian</td>
                    <td style="text-align: center;" colspan="{{ count($get_tahun) + 1 }}">Jumlah (Rp)</td>
                    <td style="text-align: center;" colspan="2">Bertambah/(Berkurang)</td>
                    <td style="text-align: center;" rowspan="2"></td>
                </tr>
                <tr>
                    <td>Sebelum Perubahan</td>
                    @foreach ($get_tahun as $gtahun)
                        <td>Setelah Perubahan ({{ $gtahun->tahun_anggaran }})</td>
                    @endforeach
                    <td style="text-align: center;">(Rp)</td>
                    <td style="text-align: center;">%</td>
                </tr>
            </thead>
            <tbody>
                {{-- HITUNG JUMLAH ANGGARAN --}}
                @php
                    $years1 = date('Y') - 1;
                    $years2 = date('Y') - 2;
                    $years3 = date('Y') - 3;
                    $years4 = date('Y') - 4;

                    $jumlah_pendapatan1 = [];
                    $jumlah_pendapatan2 = [];
                    $jumlah_pendapatan3 = [
                       $years1 => [],
                       $years2 => [],
                       $years3 => [],
                       $years4 => [],
                    ];

                    $jumlah_belanja1 = [];
                    $jumlah_belanja2 = [];
                    $jumlah_belanja3 = [
                        $years1 => [],
                        $years2 => [],
                        $years3 => [],
                        $years4 => [],
                    ];

                    $jumlah_pembiayaan1 = [];
                    $jumlah_pembiayaan2 = [];
                    $data_pembiayaan1 = [
                        $years1 => [],
                        $years2 => [],
                        $years3 => [],
                        $years4 => [],
                    ];

                    $jumlah_pembiayaan3 = [];
                    $jumlah_pembiayaan4 = [];
                    $data_pembiayaan2 = [
                        $years1 => [],
                        $years2 => [],
                        $years3 => [],
                        $years4 => [],
                    ];
                @endphp
                @foreach ($Apbd as $apbd)
                    <tr>
                        <td>{{ $apbd['kode_rekening'] }}</td>
                        <td colspan="{{ count($get_tahun) + 5 }}"><strong>{{ $apbd['nama_rekening'] }}</strong></td>
                    </tr>
                    @foreach ($apbd['data'] as $item)
                        @if ($apbd['kode_rekening'] != $item['kode_rekening'])
                            <tr>
                                <td>{{ $item['kode_rekening'] }}</td>
                                @if (isset($item['nama_rekening']) && !isset($item['sub_uraian']))
                                    <td style="padding-left: 20px;"><strong>{{ $item['uraian'] }}</strong></td>
                                    <td style="text-align: right; font-size: 14px; background-color: #B7C4CF;">
                                        <strong>{{ number_format($item['jml_anggaran_sebelum']) }}</strong>
                                    </td>
                                    @foreach ($get_tahun as $key => $tahun1)
                                        @php
                                            $bgcolor = ['#FF7D7D', '#FDFF00', '#21E1E1', '#38E54D', '#FF884B'];
                                            $data1 = App\Models\Apbd::sumSub($get_tahun[$key]['tahun_anggaran'], $item['kode_rekening']);
                                        @endphp
                                        <td
                                            style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[$key] }}">
                                            <strong>{{ number_format(floatval($data1)) }}</strong>
                                        </td>
                                    @endforeach
                                    <td style="text-align: right; font-size: 14px; background-color: #E8F9FD;">
                                        <strong>{{ number_format($item['selisih_anggaran']) }}</strong>
                                    </td>
                                    <td style="text-align: right; font-size: 14px;">
                                        <strong>{{ $item['persen'] }}%</strong>
                                    </td>
                                @elseif (isset($item['nama_rekening']) && isset($item['uraian']))
                                    <td style="padding-left: 40px;">{{ $item['sub_uraian'] }}</td>
                                    <td style="text-align: right; font-size: 12px; background-color: #B7C4CF;">
                                        {{ number_format($item['jml_anggaran_sebelum']) }}</td>
                                    @foreach ($get_tahun as $key => $tahun2)
                                        @php
                                            $data2 = App\Models\Apbd::getApbdTahun($get_tahun[$key]['tahun_anggaran'], $item['kode_rekening']);
                                        @endphp
                                        <td
                                            style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[$key] }};">
                                            {{ number_format(floatval($data2->jml_anggaran_setelah)) }}
                                        </td>
                                    @endforeach
                                    <td style="text-align: right; font-size: 12px; background-color: #E8F9FD;">
                                        {{ number_format($item['selisih_anggaran']) }}</td>
                                    <td style="text-align: right; font-size: 12px;">{{ $item['persen'] }}%</td>
                                @endif
                                <td>
                                    @if (strlen($item['kode_rekening']) == 6)
                                        <button type="button" class="btn btn-warning btn-xs" data-tooltip="tooltip"
                                            data-placement="top" title="Edit Anggaran" data-toggle="modal"
                                            data-target="#modalEdit{{ $item['apbd_id'] }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            @include('admin.Apbd.Components.edit')
                        @endif
                        @php
                            if (strlen($item['kode_rekening']) == 3 && $item['nama_rekening'] == strtoupper('pendapatan daerah')) {
                                array_push($jumlah_pendapatan1, $item['jml_anggaran_sebelum']);
                                array_push($jumlah_pendapatan2, $item['jml_anggaran_setelah']);

                                $getSum1 = App\Models\Apbd::getSumSub($years1, $item['kode_rekening']);
                                array_push($jumlah_pendapatan3[$years1], $getSum1);
                                $getSum2 = App\Models\Apbd::getSumSub($years2, $item['kode_rekening']);
                                array_push($jumlah_pendapatan3[$years2], $getSum2);
                                $getSum3 = App\Models\Apbd::getSumSub($years3, $item['kode_rekening']);
                                array_push($jumlah_pendapatan3[$years3], $getSum3);
                                $getSum4 = App\Models\Apbd::getSumSub($years4, $item['kode_rekening']);
                                array_push($jumlah_pendapatan3[$years4], $getSum4);

                            } elseif (strlen($item['kode_rekening']) == 3 && $item['nama_rekening'] == strtoupper('belanja')) {
                                array_push($jumlah_belanja1, $item['jml_anggaran_sebelum']);
                                array_push($jumlah_belanja2, $item['jml_anggaran_setelah']);

                                $getSum1 = App\Models\Apbd::getSumSub($years1, $item['kode_rekening']);
                                array_push($jumlah_belanja3[$years1], $getSum1);
                                $getSum2 = App\Models\Apbd::getSumSub($years2, $item['kode_rekening']);
                                array_push($jumlah_belanja3[$years2], $getSum2);
                                $getSum3 = App\Models\Apbd::getSumSub($years3, $item['kode_rekening']);
                                array_push($jumlah_belanja3[$years3], $getSum3);
                                $getSum4 = App\Models\Apbd::getSumSub($years4, $item['kode_rekening']);
                                array_push($jumlah_belanja3[$years4], $getSum4);

                            } elseif (strlen($item['kode_rekening']) == 6 && $item['uraian'] == strtoupper('penerimaan pembiayaan')) {
                                array_push($jumlah_pembiayaan1, $item['jml_anggaran_sebelum']);
                                array_push($jumlah_pembiayaan2, $item['jml_anggaran_setelah']);

                                $getSum1 = App\Models\Apbd::getSumSub($years1, $item['kode_rekening']);
                                array_push($data_pembiayaan1[$years1], $getSum1);
                                $getSum2 = App\Models\Apbd::getSumSub($years2, $item['kode_rekening']);
                                array_push($data_pembiayaan1[$years2], $getSum2);
                                $getSum3 = App\Models\Apbd::getSumSub($years3, $item['kode_rekening']);
                                array_push($data_pembiayaan1[$years3], $getSum3);
                                $getSum4 = App\Models\Apbd::getSumSub($years4, $item['kode_rekening']);
                                array_push($data_pembiayaan1[$years4], $getSum4);

                            } elseif (strlen($item['kode_rekening']) == 6 && $item['uraian'] == strtoupper('pengeluaran pembiayaan')) {
                                array_push($jumlah_pembiayaan3, $item['jml_anggaran_sebelum']);
                                array_push($jumlah_pembiayaan4, $item['jml_anggaran_setelah']);

                                $getSum1 = App\Models\Apbd::getSumSub($years1, $item['kode_rekening']);
                                array_push($data_pembiayaan2[$years1], $getSum1);
                                $getSum2 = App\Models\Apbd::getSumSub($years2, $item['kode_rekening']);
                                array_push($data_pembiayaan2[$years2], $getSum2);
                                $getSum3 = App\Models\Apbd::getSumSub($years3, $item['kode_rekening']);
                                array_push($data_pembiayaan2[$years3], $getSum3);
                                $getSum4 = App\Models\Apbd::getSumSub($years4, $item['kode_rekening']);
                                array_push($data_pembiayaan2[$years4], $getSum4);

                            }
                        @endphp
                    @endforeach
                    <tr>
                        @if ($apbd['nama_rekening'] == 'PENDAPATAN DAERAH')
                            <td></td>
                            <td style="text-align: right;"><strong>Jumlah Pendapatan</strong></td>
                            <td style="text-align: right; font-size: 14px; background-color: #B7C4CF;">
                                <strong>{{ number_format(array_sum($jumlah_pendapatan1)) }}</strong>
                            </td>
                            {{-- simpan data jumlah pendapatan1 untuk di kirim ke grafik --}}
                            <input type="hidden" value="{{ array_sum($jumlah_pendapatan1) }}" id="jumlah_pendapatan1">
                            <td style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[0] }};">
                                <strong>{{ number_format(array_sum($jumlah_pendapatan2)) }}</strong>
                            </td>
                            <td style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[1] }};">
                                <strong>{{ number_format(array_sum($jumlah_pendapatan3[$years1])) }}</strong>
                            </td>
                            <td style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[2] }};">
                                <strong>{{ number_format(array_sum($jumlah_pendapatan3[$years2])) }}</strong>
                            </td>
                            <td style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[3] }};">
                                <strong>{{ number_format(array_sum($jumlah_pendapatan3[$years3])) }}</strong>
                            </td>
                            <td style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[4] }};">
                                <strong>{{ number_format(array_sum($jumlah_pendapatan3[$years4])) }}</strong>
                            </td>
                            {{-- simpan data jumlah pendapatan2 untuk di kirim ke grafik --}}
                            <input type="hidden" value="{{ array_sum($jumlah_pendapatan2) }}" id="jumlah_pendapatan2">
                            @php
                                $selisih_pendapatan1 = array_sum($jumlah_pendapatan1) - array_sum($jumlah_pendapatan2);
                                $count_persen_pendapatan1 = (array_sum($jumlah_pendapatan1) - array_sum($jumlah_pendapatan2)) / array_sum($jumlah_pendapatan1);
                                if ($count_persen_pendapatan1 < 0) {
                                    $persen_pendapatan1 = abs(round($count_persen_pendapatan1 * 100, 2));
                                } elseif ($count_persen_pendapatan1 > 0) {
                                    $persen_pendapatan1 = round($count_persen_pendapatan1 * 100, 2);
                                }
                            @endphp
                            <td style="text-align: right; font-size: 14px; background-color: #E8F9FD;">
                                <strong>{{ number_format(abs($selisih_pendapatan1)) }}</strong>
                            </td>
                            <td style="text-align: right;"><strong>{{ $persen_pendapatan1 }}%</strong></td>
                            <td></td>
                        @elseif ($apbd['nama_rekening'] == 'BELANJA')
                            <td></td>
                            <td style="text-align: right"><strong>Jumlah belanja</strong></td>
                            <td style="text-align: right; font-size: 14px; background-color: #B7C4CF;">
                                <strong>{{ number_format(array_sum($jumlah_belanja1)) }}</strong>
                            </td>
                            {{-- simpan data jumlah belanja1 untuk di kirim ke grafik --}}
                            <input type="hidden" value="{{ array_sum($jumlah_belanja1) }}" id="jumlah_belanja1">
                            <td style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[0] }};">
                                <strong>{{ number_format(array_sum($jumlah_belanja2)) }}</strong>
                            </td>
                            <td style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[1] }};">
                                <strong>{{ number_format(array_sum($jumlah_belanja3[$years1])) }}</strong>
                            </td>
                            <td style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[2] }};">
                                <strong>{{ number_format(array_sum($jumlah_belanja3[$years2])) }}</strong>
                            </td>
                            <td style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[3] }};">
                                <strong>{{ number_format(array_sum($jumlah_belanja3[$years3])) }}</strong>
                            </td>
                            <td style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[4] }};">
                                <strong>{{ number_format(array_sum($jumlah_belanja3[$years4])) }}</strong>
                            </td>
                            {{-- simpan data jumlah belanja2 untuk di kirim ke grafik --}}
                            <input type="hidden" value="{{ array_sum($jumlah_belanja2) }}" id="jumlah_belanja2">
                            @php
                                $selisih_belanja = array_sum($jumlah_belanja1) - array_sum($jumlah_belanja2);
                                $count_persen_belanja = (array_sum($jumlah_belanja1) - array_sum($jumlah_belanja2)) / array_sum($jumlah_belanja1);
                                if ($count_persen_belanja < 0) {
                                    $persen_belanja = abs(round($count_persen_belanja * 100, 2));
                                } elseif ($count_persen_belanja > 0) {
                                    $persen_belanja = round($count_persen_belanja * 100, 2);
                                }
                            @endphp
                            <td style="text-align: right; font-size: 14px; background-color: #E8F9FD;">
                                <strong>{{ number_format(abs($selisih_belanja)) }}</strong>
                            </td>
                            <td style="text-align: right"><strong>{{ $persen_belanja }}%</strong></td>
                            <td></td>
                        @endif
                    </tr>
                    <tr>
                        @if ($apbd['nama_rekening'] == 'BELANJA')
                            <td></td>
                            <td style="text-align: right;"><strong>Total Surplus/(Defisit)</strong></td>
                            @php
                                $defisit1 = array_sum($jumlah_pendapatan1) - array_sum($jumlah_belanja1);
                                $defisit2 = array_sum($jumlah_pendapatan2) - array_sum($jumlah_belanja2);
                                $total_defisit = $defisit1 - $defisit2;
                                $count_persen_defisit = ($defisit1 - $defisit2) / $defisit1;
                                if ($count_persen_defisit < 0) {
                                    $persen_defisit = abs(round($count_persen_defisit * 100, 2));
                                } elseif ($count_persen_defisit > 0) {
                                    $persen_defisit = round($count_persen_defisit * 100, 2);
                                }
                            @endphp
                            <td style="text-align: right; background-color: #B7C4CF;">
                                <strong>{{ number_format($defisit1) }}</strong>
                            </td>
                            <td style="text-align: right; background-color: {{ $bgcolor[0] }};">
                                <strong>{{ number_format($defisit2) }}</strong>
                            </td>
                            <td style="text-align: right; background-color: {{ $bgcolor[1] }};"></td>
                            <td style="text-align: right; background-color: {{ $bgcolor[2] }};"></td>
                            <td style="text-align: right; background-color: {{ $bgcolor[3] }};"></td>
                            <td style="text-align: right; background-color: {{ $bgcolor[4] }};"></td>
                            <td style="text-align: right; background-color: #E8F9FD;">
                                <strong>{{ number_format($total_defisit) }}</strong>
                            </td>
                            <td style="text-align: right;"><strong>{{ $persen_defisit }}%</strong></td>
                            <td></td>
                        @endif
                    </tr>
                    @if ($apbd['nama_rekening'] == strtoupper('pembiayaan'))
                        <tr>
                            <td></td>
                            <td style="text-align: right;"><strong>Jumlah Penerimaan Pembiayaan</strong></td>
                            <td style="text-align: right; font-size: 14px; background-color: #B7C4CF;">
                                <strong>{{ number_format(array_sum($jumlah_pembiayaan1)) }}</strong>
                            </td>
                            {{-- simpan data jumlah pembiayaan1 untuk di kirim ke grafik --}}
                            <input type="hidden" value="{{ array_sum($jumlah_pembiayaan1) }}"
                                id="jumlah_pembiayaan1">
                            <td style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[0] }};">
                                <strong>{{ number_format(array_sum($jumlah_pembiayaan2)) }}</strong>
                            </td>
                            <td style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[1] }};">
                                <strong>{{ number_format(array_sum($data_pembiayaan1[$years1])) }}</strong>
                            </td>
                            <td style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[2] }};">
                                <strong>{{ number_format(array_sum($data_pembiayaan1[$years2])) }}</strong>
                            </td>
                            <td style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[3] }};">
                                <strong>{{ number_format(array_sum($data_pembiayaan1[$years3])) }}</strong>
                            </td>
                            <td style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[4] }};">
                                <strong>{{ number_format(array_sum($data_pembiayaan1[$years4])) }}</strong>
                            </td>
                            {{-- simpan data jumlah pembiayaan2 untuk di kirim ke grafik --}}
                            <input type="hidden" value="{{ array_sum($jumlah_pembiayaan2) }}"
                                id="jumlah_pembiayaan2">
                            @php
                                $selisih_pembiayaan1 = array_sum($jumlah_pembiayaan1) - array_sum($jumlah_pembiayaan2);
                                $count_persen_pembiayaan1 = (array_sum($jumlah_pembiayaan1) - array_sum($jumlah_pembiayaan2)) / array_sum($jumlah_pembiayaan1);
                                if ($count_persen_pembiayaan1 < 0) {
                                    $persen_pembiayaan1 = abs(round($count_persen_pembiayaan1 * 100, 2));
                                } elseif ($count_persen_pembiayaan1 > 0) {
                                    $persen_pembiayaan1 = round($count_persen_pembiayaan1 * 100, 2);
                                }
                            @endphp
                            <td style="text-align: right; font-size: 14px; background-color: #E8F9FD;">
                                <strong>{{ number_format($selisih_pembiayaan1) }}</strong>
                            </td>
                            <td style="text-align: right"><strong>{{ $persen_pembiayaan1 }}%</strong></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: right;"><strong>Jumlah Pengeluaran Pembiayaan</strong></td>
                            <td style="text-align: right; font-size: 14px; background-color: #B7C4CF;">
                                <strong>{{ number_format(array_sum($jumlah_pembiayaan3)) }}</strong>
                            </td>
                            <td style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[0] }};">
                                <strong>{{ number_format(array_sum($jumlah_pembiayaan4)) }}</strong>
                            </td>
                            <td style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[1] }};">
                                {{ number_format(array_sum($data_pembiayaan2[$years1])) }}
                            </td>
                            <td style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[2] }};">
                                {{ number_format(array_sum($data_pembiayaan2[$years2])) }}
                            </td>
                            <td style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[3] }};">
                                {{ number_format(array_sum($data_pembiayaan2[$years3])) }}
                            </td>
                            <td style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[4] }};">
                                {{ number_format(array_sum($data_pembiayaan2[$years4])) }}
                            </td>
                            @php
                                $selisih_pembiayaan2 = array_sum($jumlah_pembiayaan3) - array_sum($jumlah_pembiayaan4);
                                $count_persen_pembiayaan2 = (array_sum($jumlah_pembiayaan3) - array_sum($jumlah_pembiayaan4)) / array_sum($jumlah_pembiayaan3);
                                if ($count_persen_pembiayaan2 < 0) {
                                    $persen_pembiayaan2 = abs(round($count_persen_pembiayaan2 * 100, 2));
                                } elseif ($count_persen_pembiayaan2 > 0) {
                                    $persen_pembiayaan2 = round($count_persen_pembiayaan2 * 100, 2);
                                }
                            @endphp
                            <td style="text-align: right; font-size: 14px; background-color: #E8F9FD;">
                                <strong>{{ number_format($selisih_pembiayaan2) }}</strong>
                            </td>
                            <td style="text-align: right;"><strong>{{ $persen_pembiayaan2 }}%</strong></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: right"><strong>Pembiayaan Neto</strong></td>
                            @php
                                $neto1 = array_sum($jumlah_pembiayaan1) - array_sum($jumlah_pembiayaan3);
                                $neto2 = array_sum($jumlah_pembiayaan2) - array_sum($jumlah_pembiayaan4);
                                $selisih_neto = $neto1 - $neto2;
                                $count_persen_neto = ($neto1 - $neto2) / $neto1;
                                if ($count_persen_neto < 0) {
                                    $persen_neto = abs(round($count_persen_neto * 100, 2));
                                } elseif ($count_persen_neto > 0) {
                                    $persen_neto = round($count_persen_neto * 100, 2);
                                }
                            @endphp
                            <td style="text-align: right; font-size: 14px; background-color: #B7C4CF;">
                                <strong>{{ number_format($neto1) }}</strong>
                            </td>
                            <td style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[0] }};">
                                <strong>{{ number_format($neto2) }}</strong>
                            </td>
                            <td style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[1] }};">
                            </td>
                            <td style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[2] }};">
                            </td>
                            <td style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[3] }};">
                            </td>
                            <td style="text-align: right; font-size: 14px; background-color: {{ $bgcolor[4] }};">
                            </td>
                            <td style="text-align: right; font-size: 14px; background-color: #E8F9FD;">
                                <strong>{{ number_format($selisih_neto) }}</strong>
                            </td>
                            <td style="text-align: right; font-size: 14px;"><strong>{{ $persen_neto }}%</strong></td>
                            <td></td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-hover table-striped table-bordered" id="realisasi-table">
        <thead>
            <tr>
                <th style="text-align: center;" rowspan="2">Kode</th>
                <th style="text-align: center;" rowspan="2">Uraian</th>
                <th style="text-align: center;" colspan="2">Jumlah (Rp)</th>
                <th style="text-align: center;" colspan="2">Bertambah/(Berkurang)</th>
            </tr>
            <tr>
                <th>Sebelum Perubahan</th>
                <th>Setelah Perubahan</th>
                <th style="text-align: center;">Anggaran Terealisasi</th>
                <th style="text-align: center;">%</th>
            </tr>
        </thead>
        <tbody>
            {{-- HITUNG JUMLAH ANGGARAN --}}
            @php
                $jumlah_pendapatan1 = [];
                $jumlah_pendapatan2 = [];

                $jumlah_belanja1 = [];
                $jumlah_belanja2 = [];

                $jumlah_pembiayaan1 = [];
                $jumlah_pembiayaan2 = [];

                $jumlah_pembiayaan3 = [];
                $jumlah_pembiayaan4 = [];

                $realisasi_pendapatan = [];
                $realisasi_belanja = [];
                $realisasi_pembiayaan1 = [];
                $realisasi_pembiayaan2 = [];
            @endphp

            @foreach ($Apbd as $apbd)
                <tr>
                    <td>{{ $apbd['kode_rekening'] }}</td>
                    <td><strong>{{ $apbd['nama_rekening'] }}</strong></td>
                    <td colspan="4"></td>
                </tr>
                @foreach ($apbd['data'] as $item)
                    @if ($apbd['kode_rekening'] != $item['kode_rekening'])
                        <tr>
                            <td>{{ $item['kode_rekening'] }}</td>
                            @if (isset($item['nama_rekening']) && !isset($item['sub_uraian']))
                                <td style="padding-left: 20px;"><strong>{{ $item['uraian'] }}</strong></td>
                                <td style="text-align: right; font-size: 14px;">
                                    <strong>{{ number_format($item['jml_anggaran_sebelum']) }}</strong>
                                </td>
                                <td style="text-align: right; font-size: 14px;">
                                    <strong>{{ number_format($item['jml_anggaran_setelah']) }}</strong>
                                </td>
                                <td style="text-align: right; font-size: 14px;">
                                    @php $sumSub = \App\Models\LaporanRealisasiAnggaran::sumSub($item['kode_rekening']) @endphp
                                    <strong>{{ number_format($sumSub) }}</strong>
                                </td>
                                <td style="text-align: right; font-size: 14px;">
                                    @php $persenSub = ($sumSub / $item['jml_anggaran_setelah']) * 100 @endphp
                                    <strong>{{ round($persenSub, 2) }}%</strong>
                                </td>
                            @elseif (isset($item['nama_rekening']) && isset($item['uraian']))
                                <td style="padding-left: 40px;">{{ $item['sub_uraian'] }}</td>
                                <td style="text-align: right; font-size: 12px;">
                                    {{ number_format($item['jml_anggaran_sebelum']) }}</td>
                                <td style="text-align: right; font-size: 12px;">
                                    {{ number_format($item['jml_anggaran_setelah']) }}</td>
                                <td style="text-align: right; font-size: 12px;">
                                    {{ number_format($item['anggaran_terealisasi']) }}</td>
                                <td style="text-align: right; font-size: 12px;">
                                    @php
                                        $persen = $item['anggaran_terealisasi'] == 0 ? 0 : ($item['anggaran_terealisasi'] / $item['jml_anggaran_setelah']) * 100;
                                    @endphp
                                    {{ round($persen, 2) }} %
                                </td>
                            @endif
                        </tr>
                    @endif
                    @php
                        // push data when get 3 digit kode rekening
                        if (strlen($item['kode_rekening']) == 3 && $item['nama_rekening'] == strtoupper('pendapatan daerah')) {
                            array_push($jumlah_pendapatan1, $item['jml_anggaran_sebelum']);
                            array_push($jumlah_pendapatan2, $item['jml_anggaran_setelah']);
                        } elseif (strlen($item['kode_rekening']) == 3 && $item['nama_rekening'] == strtoupper('belanja')) {
                            array_push($jumlah_belanja1, $item['jml_anggaran_sebelum']);
                            array_push($jumlah_belanja2, $item['jml_anggaran_setelah']);
                        } elseif (strlen($item['kode_rekening']) == 6 && $item['uraian'] == strtoupper('penerimaan pembiayaan')) {
                            array_push($jumlah_pembiayaan1, $item['jml_anggaran_sebelum']);
                            array_push($jumlah_pembiayaan2, $item['jml_anggaran_setelah']);
                        } elseif (strlen($item['kode_rekening']) == 6 && $item['uraian'] == strtoupper('pengeluaran pembiayaan')) {
                            array_push($jumlah_pembiayaan3, $item['jml_anggaran_sebelum']);
                            array_push($jumlah_pembiayaan4, $item['jml_anggaran_setelah']);
                        }

                        // push data when get more than 3 digit kode rekening
                        if (strlen($item['kode_rekening']) > 3 && $item['nama_rekening'] == strtoupper('pendapatan daerah')) {
                            array_push($realisasi_pendapatan, $item['anggaran_terealisasi']);
                        } elseif (strlen($item['kode_rekening']) > 3 && $item['nama_rekening'] == strtoupper('belanja')) {
                            array_push($realisasi_belanja, $item['anggaran_terealisasi']);
                        }
                    @endphp
                @endforeach
                <tr>
                    @if ($apbd['nama_rekening'] == 'PENDAPATAN DAERAH')
                        <td></td>
                        <td style="text-align: right;"><strong>Jumlah Pendapatan</strong></td>
                        <td style="text-align: right; font-size: 14px;">
                            <strong>{{ number_format(array_sum($jumlah_pendapatan1)) }}</strong>
                        </td>
                        {{-- simpan data jumlah pendapatan1 untuk di kirim ke grafik --}}
                        <input type="hidden" value="{{ array_sum($jumlah_pendapatan1) }}" id="jumlah_pendapatan1">
                        <td style="text-align: right; font-size: 14px;">
                            <strong>{{ number_format(array_sum($jumlah_pendapatan2)) }}</strong>
                        </td>
                        {{-- simpan data jumlah pendapatan2 untuk di kirim ke grafik --}}
                        <input type="hidden" value="{{ array_sum($jumlah_pendapatan2) }}" id="jumlah_pendapatan2">
                        @php
                            $realisasi_pendapatan1 = array_sum($jumlah_pendapatan2) - array_sum($realisasi_pendapatan);
                            if (array_sum($realisasi_pendapatan) > 0) {
                                $persen_pendapatan1 = array_sum($jumlah_pendapatan2) / array_sum($realisasi_pendapatan) / 100;
                            } elseif (array_sum($realisasi_pendapatan) <= 0) {
                                $persen_pendapatan1 = 0;
                            }
                        @endphp
                        <td style="text-align: right; font-size: 14px;">
                            <strong>{{ number_format(abs($realisasi_pendapatan1)) }}</strong>
                        </td>
                        <td style="text-align: right;"><strong>{{ round($persen_pendapatan1, 2) }}%</strong></td>
                    @elseif ($apbd['nama_rekening'] == 'BELANJA')
                        <td></td>
                        <td style="text-align: right"><strong>Jumlah belanja</strong></td>
                        <td style="text-align: right; font-size: 14px;">
                            <strong>{{ number_format(array_sum($jumlah_belanja1)) }}</strong>
                        </td>
                        {{-- simpan data jumlah belanja1 untuk di kirim ke grafik --}}
                        <input type="hidden" value="{{ array_sum($jumlah_belanja1) }}" id="jumlah_belanja1">
                        <td style="text-align: right; font-size: 14px;">
                            <strong>{{ number_format(array_sum($jumlah_belanja2)) }}</strong>
                        </td>
                        {{-- simpan data jumlah belanja2 untuk di kirim ke grafik --}}
                        <input type="hidden" value="{{ array_sum($jumlah_belanja2) }}" id="jumlah_belanja2">
                        @php
                            $jumlah_belanja = array_sum($jumlah_belanja2) - array_sum($realisasi_belanja);
                            if (array_sum($realisasi_belanja) > 0) {
                                $persen_belanja = array_sum($jumlah_belanja2) / array_sum($realisasi_belanja) / 100;
                            } elseif (array_sum($realisasi_belanja) <= 0) {
                                $persen_belanja = 0;
                            }
                        @endphp
                        <td style="text-align: right; font-size: 14px;">
                            <strong>{{ number_format($jumlah_belanja) }}</strong>
                        </td>
                        <td style="text-align: right"><strong>{{ round($persen_belanja, 2) }}%</strong></td>
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
                        <td style="text-align: right;"><strong>{{ number_format($defisit1) }}</strong></td>
                        <td style="text-align: right;"><strong>{{ number_format($defisit2) }}</strong></td>
                        <td style="text-align: right;"><strong>{{ number_format($total_defisit) }}</strong></td>
                        <td style="text-align: right;"><strong>{{ $persen_defisit }}%</strong></td>
                    @endif
                </tr>
                @if ($apbd['nama_rekening'] == strtoupper('pembiayaan'))
                    <tr>
                        <td></td>
                        <td style="text-align: right;"><strong>Jumlah Penerimaan Pembiayaan</strong></td>
                        <td style="text-align: right; font-size: 14px;">
                            <strong>{{ number_format(array_sum($jumlah_pembiayaan1)) }}</strong>
                        </td>
                        {{-- simpan data jumlah pembiayaan1 untuk di kirim ke grafik --}}
                        <input type="hidden" value="{{ array_sum($jumlah_pembiayaan1) }}" id="jumlah_pembiayaan1">
                        <td style="text-align: right; font-size: 14px;">
                            <strong>{{ number_format(array_sum($jumlah_pembiayaan2)) }}</strong>
                        </td>
                        {{-- simpan data jumlah pembiayaan2 untuk di kirim ke grafik --}}
                        <input type="hidden" value="{{ array_sum($jumlah_pembiayaan2) }}" id="jumlah_pembiayaan2">
                        @php
                            $selisih_pembiayaan1 = array_sum($jumlah_pembiayaan2) - array_sum($realisasi_pembiayaan1);
                            if (array_sum($realisasi_pembiayaan1) > 0) {
                                $persen_pembiayaan1 = array_sum($jumlah_pembiayaan2) / array_sum($realisasi_pembiayaan1) / 100;
                            } elseif (array_sum($realisasi_pembiayaan1) <= 0) {
                                $persen_pembiayaan1 = 0;
                            }
                        @endphp
                        <td style="text-align: right; font-size: 14px;">
                            <strong>{{ number_format($selisih_pembiayaan1) }}</strong>
                        </td>
                        <td style="text-align: right"><strong>{{ round($persen_pembiayaan1, 2) }}%</strong></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align: right;"><strong>Jumlah Pengeluaran Pembiayaan</strong></td>
                        <td style="text-align: right; font-size: 14px;">
                            <strong>{{ number_format(array_sum($jumlah_pembiayaan3)) }}</strong>
                        </td>
                        <td style="text-align: right; font-size: 14px;">
                            <strong>{{ number_format(array_sum($jumlah_pembiayaan4)) }}</strong>
                        </td>
                        @php
                            $selisih_pembiayaan2 = array_sum($jumlah_pembiayaan4) - array_sum($realisasi_pembiayaan2);
                            if (array_sum($realisasi_pembiayaan2) > 0) {
                                $persen_pembiayaan2 = array_sum($jumlah_pembiayaan4) / array_sum($realisasi_pembiayaan2) / 100;
                            } elseif (array_sum($realisasi_pembiayaan2) <= 0) {
                                $persen_pembiayaan2 = 0;
                            }
                        @endphp
                        <td style="text-align: right; font-size: 14px;">
                            <strong>{{ number_format($selisih_pembiayaan2) }}</strong>
                        </td>
                        <td style="text-align: right;"><strong>{{ round($persen_pembiayaan2, 2) }}%</strong></td>
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
                        <td style="text-align: right; font-size: 14px;">
                            <strong>{{ number_format($neto1) }}</strong>
                        </td>
                        <td style="text-align: right; font-size: 14px;">
                            <strong>{{ number_format($neto2) }}</strong>
                        </td>
                        <td style="text-align: right; font-size: 14px;">
                            <strong>{{ number_format($selisih_neto) }}</strong>
                        </td>
                        <td style="text-align: right; font-size: 14px;"><strong>{{ $persen_neto }}%</strong></td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

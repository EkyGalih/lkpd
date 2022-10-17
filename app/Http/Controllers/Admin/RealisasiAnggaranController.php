<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KodeRekening;
use App\Models\LaporanRealisasiAnggaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealisasiAnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        $user = User::where('username', '=', Auth::user()->username)->select('id as user_id')->first();
        $kodeRekening = KodeRekening::select('id as rekening_id', 'kode_rekening.*')
        // ->where('jenis_rekening', '=', 'realisasi')
        ->orderBy('kode_rekening', 'ASC')
        ->get();

        $realisasi = LaporanRealisasiAnggaran::select('id as realisasi_id', 'realisasi_anggaran.*')->get();

        $data = [
            'jenis_laporan' => array(),
            'data' => array(),
        ];
        $jenis_laporan = [];
        foreach($realisasi as $k => $val) {
            if (!isset($jenis_laporan[$val->jenis_laporan])) {
                $jenis_laporan[$val->jenis_laporan] = [];
            }
        }
        $c_sort = count($jenis_laporan);
        $i = 0;
        if (is_array($jenis_laporan) && ($c_sort > 0)) {
            foreach($jenis_laporan as $k => $v) {
                array_push($data['jenis_laporan'], $k);
                $data['data'][$k] = array(
                    'jenis_laporan' => $k,
                    'ref1' => '',
                    'ref_arus_masuk' => '',
                    'ref_arus_keluar' => '',
                    'jenis_arus_kas' => [
                        'arus_masuk' => array(),
                        'arus_keluar' => array()
                    ],
                );
            }
            foreach($realisasi as $key => $val) {
                if (in_array($val->jenis_laporan, $data['jenis_laporan'])) {
                    if (!isset($data['data'][$val->jenis_laporan]['jenis_arus_kas'])) {
                        $data['data'][$val->jenis_laporan]['ref1'] = $val->ref1;
                        $data['tahun1'] = $val->tahun_anggaran;
                        $data['tahun2'] = $val->tahun_anggaran_sebelum;
                        if ($val->jenis_arus_kas == 'Arus Masuk Kas')
                        {
                            $data['data'][$val->jenis_laporan]['ref_arus_masuk'] = $val->ref2;
                            $data['data'][$val->jenis_laporan]['jenis_arus_kas']['arus_masuk'] = [
                                'jenis_laporan' => $val->jenis_laporan,
                                'arus_kas_id' => $val->arus_kas_id,
                                'ref1' => $val->ref1,
                                'jenis_arus_kas' => $val->jenis_arus_kas,
                                'ref2' => $val->ref2,
                                'uraian' => $val->uraian,
                                'ref3' => $val->ref3,
                                'tahun_anggaran' => $val->tahun_anggaran,
                                'anggaran' => $val->anggaran,
                                'tahun_anggaran_sebelum' => $val->tahun_anggaran_sebelum,
                                'anggaran_tahun_sebelum' => $val->anggaran_tahun_sebelum,
                                'sub_total_saldo1' => $val->sub_total_saldo1,
                                'sub_total_saldo2' => $val->sub_total_saldo2,
                                'total_saldo1' => $val->total_saldo1,
                                'total_saldo2' => $val->total_saldo2
                            ];
                        } elseif ($val->jenis_arus_kas == 'Arus Keluar Kas') {
                            $data['data'][$val->jenis_laporan]['ref_arus_keluar'] = $val->ref2;
                            $data['data'][$val->jenis_laporan]['jenis_arus_kas']['arus_keluar'] = [
                                'arus_kas_id' => $val->arus_kas_id,
                                'jenis_laporan' => $val->jenis_laporan,
                                'ref1' => $val->ref1,
                                'jenis_arus_kas' => $val->jenis_arus_kas,
                                'ref2' => $val->ref2,
                                'uraian' => $val->uraian,
                                'ref3' => $val->ref3,
                                'tahun_anggaran' => $val->tahun_anggaran,
                                'anggaran' => $val->anggaran,
                                'tahun_anggaran_sebelum' => $val->tahun_anggaran_sebelum,
                                'anggaran_tahun_sebelum' => $val->anggaran_tahun_sebelum,
                                'sub_total_saldo1' => $val->sub_total_saldo1,
                                'sub_total_saldo2' => $val->sub_total_saldo2,
                                'total_saldo1' => $val->total_saldo1,
                                'total_saldo2' => $val->total_saldo2
                            ];
                        }
                    } else {
                        $data['data'][$val->jenis_laporan]['ref1'] = $val->ref1;
                        $data['tahun1'] = $val->tahun_anggaran;
                        $data['tahun2'] = $val->tahun_anggaran_sebelum;
                        if ($val->jenis_arus_kas == 'Arus Masuk Kas')
                        {
                            $data['data'][$val->jenis_laporan]['ref_arus_masuk'] = $val->ref2;
                            array_push($data['data'][$val->jenis_laporan]['jenis_arus_kas']['arus_masuk'], [
                                'arus_kas_id' => $val->arus_kas_id,
                                'jenis_laporan' => $val->jenis_laporan,
                                'ref1' => $val->ref1,
                                'jenis_arus_kas' => $val->jenis_arus_kas,
                                'ref2' => $val->ref2,
                                'uraian' => $val->uraian,
                                'ref3' => $val->ref3,
                                'tahun_anggaran' => $val->tahun_anggaran,
                                'anggaran' => $val->anggaran,
                                'tahun_anggaran_sebelum' => $val->tahun_anggaran_sebelum,
                                'anggaran_tahun_sebelum' => $val->anggaran_tahun_sebelum,
                                'sub_total_saldo1' => $val->sub_total_saldo1,
                                'sub_total_saldo2' => $val->sub_total_saldo2,
                                'total_saldo1' => $val->total_saldo1,
                                'total_saldo2' => $val->total_saldo2
                            ]);
                        } elseif ($val->jenis_arus_kas == 'Arus Keluar Kas') {
                            $data['data'][$val->jenis_laporan]['ref_arus_keluar'] = $val->ref2;
                            array_push($data['data'][$val->jenis_laporan]['jenis_arus_kas']['arus_keluar'], [
                                'arus_kas_id' => $val->arus_kas_id,
                                'jenis_laporan' => $val->jenis_laporan,
                                'ref1' => $val->ref1,
                                'jenis_arus_kas' => $val->jenis_arus_kas,
                                'ref2' => $val->ref2,
                                'uraian' => $val->uraian,
                                'ref3' => $val->ref3,
                                'tahun_anggaran' => $val->tahun_anggaran,
                                'anggaran' => $val->anggaran,
                                'tahun_anggaran_sebelum' => $val->tahun_anggaran_sebelum,
                                'anggaran_tahun_sebelum' => $val->anggaran_tahun_sebelum,
                                'sub_total_saldo1' => $val->sub_total_saldo1,
                                'sub_total_saldo2' => $val->sub_total_saldo2,
                                'total_saldo1' => $val->total_saldo1,
                                'total_saldo2' => $val->total_saldo2
                            ]);
                        }
                    }
                }
            }
        }

        $realisasi = $data['data'];
        $tahun1 = isset($data['tahun1']) ? $data['tahun1'] : '-';
        $tahun2 = isset($data['tahun2']) ? $data['tahun2'] : '-';
        if ($id == null)
        {
            return view('admin.RealisasiAnggaran.realisasi-anggaran', compact('user','kodeRekening', 'realisasi','tahun1', 'tahun2'));
        } else {
            $edit = LaporanRealisasiAnggaran::select('id as realisasi_id', 'realisasi_anggaran.*')->where('id', '=', $id)->first();
            return view('admin.RealisasiAnggaran.realisasi-anggaran', compact('user','kodeRekening', 'realisasi','tahun1', 'tahun2', 'edit'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

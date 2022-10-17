<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArusKas;
use App\Models\KodeRekening;
use App\Models\TotalSaldo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Webpatser\Uuid\Uuid;

class ArusKasController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index($TahunAnggaran = null, $bulan = null, $minggu = null)
    {
        $user = User::where('username', '=', Auth::user()->username)->select('id as user_id')->first();
        $kodeRekening = KodeRekening::select('id as rekening_id', 'kode_rekening.*')
        ->where('jenis_rekening', '=', 'arus_kas')
        ->orderBy('kode_rekening', 'ASC')
        ->get();

        if ($TahunAnggaran == null) {
            $arus_kas = ArusKas::select('id as arus_kas_id', 'arus_kas.*')->where('tahun_anggaran', '=', date('Y'))->get();
        } elseif ($TahunAnggaran != null) {
            $arus_kas = ArusKas::select('id as arus_kas_id', 'arus_kas.*')->where('tahun_anggaran', '=', $TahunAnggaran)->get();
        }

        $data = [
            'jenis_laporan' => array(),
            'data' => array(),
        ];
        $jenis_laporan = [];
        foreach($arus_kas as $k => $val) {
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
            foreach($arus_kas as $key => $val) {
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
                                'kode_unik' => $val->kode_unik,
                                'arus_kas_id' => $val->arus_kas_id,
                                'ref1' => $val->ref1,
                                'jenis_arus_kas' => $val->jenis_arus_kas,
                                'ref2' => $val->ref2,
                                'uraian' => $val->uraian,
                                'ref3' => $val->ref3,
                                'tahun_anggaran' => $val->tahun_anggaran,
                                'anggaran' => $val->anggaran,
                            ];
                        } elseif ($val->jenis_arus_kas == 'Arus Keluar Kas') {
                            $data['data'][$val->jenis_laporan]['ref_arus_keluar'] = $val->ref2;
                            $data['data'][$val->jenis_laporan]['jenis_arus_kas']['arus_keluar'] = [
                                'arus_kas_id' => $val->arus_kas_id,
                                'jenis_laporan' => $val->jenis_laporan,
                                'kode_unik' => $val->kode_unik,
                                'ref1' => $val->ref1,
                                'jenis_arus_kas' => $val->jenis_arus_kas,
                                'ref2' => $val->ref2,
                                'uraian' => $val->uraian,
                                'ref3' => $val->ref3,
                                'tahun_anggaran' => $val->tahun_anggaran,
                                'anggaran' => $val->anggaran,
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
                                'kode_unik' => $val->kode_unik,
                                'ref1' => $val->ref1,
                                'jenis_arus_kas' => $val->jenis_arus_kas,
                                'ref2' => $val->ref2,
                                'uraian' => $val->uraian,
                                'ref3' => $val->ref3,
                                'tahun_anggaran' => $val->tahun_anggaran,
                                'anggaran' => $val->anggaran,
                            ]);
                        } elseif ($val->jenis_arus_kas == 'Arus Keluar Kas') {
                            $data['data'][$val->jenis_laporan]['ref_arus_keluar'] = $val->ref2;
                            array_push($data['data'][$val->jenis_laporan]['jenis_arus_kas']['arus_keluar'], [
                                'arus_kas_id' => $val->arus_kas_id,
                                'jenis_laporan' => $val->jenis_laporan,
                                'kode_unik' => $val->kode_unik,
                                'ref1' => $val->ref1,
                                'jenis_arus_kas' => $val->jenis_arus_kas,
                                'ref2' => $val->ref2,
                                'uraian' => $val->uraian,
                                'ref3' => $val->ref3,
                                'tahun_anggaran' => $val->tahun_anggaran,
                                'anggaran' => $val->anggaran,
                            ]);
                        }
                    }
                }
            }
        }

        $arus_kas = $data['data'];
        $get_tahun = ArusKas::select('tahun_anggaran')->groupBy('tahun_anggaran')->orderBy('tahun_anggaran', 'DESC')->limit('10')->get();
        $tahun = isset($get_tahun) ? $get_tahun : [];
        $tahun1 = isset($data['tahun1']) ? $data['tahun1'] : null;
        $tahun2 = isset($data['tahun1']) ? ($data['tahun1']-1) : null;
        $bulans = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

        // mengambil nilai tahun, bulan dan minggu
        $get_bulan = $bulan == null ? null : $bulan;
        $get_minggu = $minggu == null ? null : $minggu;

        return view('admin.ArusKas.arus_kas', compact('user','kodeRekening', 'arus_kas', 'tahun', 'tahun1', 'tahun2', 'bulans', 'TahunAnggaran', 'get_bulan', 'get_minggu'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('admin.ArusKas.tambah', compact('user'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreArusKasRequest  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $arus_kas = ArusKas::where('uraian', '=', $request->uraian)
        ->where('ref2', '=', $request->ref2)
        ->where('tahun_anggaran', '=', $request->tahun_anggaran)
        ->select('id as arus_kas_id', 'kode_unik', 'anggaran')
        ->first();
        $total_saldo = TotalSaldo::where('bulan', '=', $request->bulan)->where('minggu', '=', $request->minggu)->first();
        if ($total_saldo != null)
        {
            return redirect()->back()->with(['warning' => 'Data kas bulan '.$request->bulan . ' dan minggu ke-'.$request->minggu . ' sudah ada!']);
        } else {
            $kode_unik = (string)Uuid::generate(4);

            if (isset($arus_kas))
            {
                $anggaran = $arus_kas->anggaran + $request->total;
                ArusKas::where('id', '=', $arus_kas->arus_kas_id)->update([
                    'kode_unik' => $arus_kas->kode_unik,
                    'jenis_laporan' => $request->jenis_laporan,
                    'ref1' => $request->ref1,
                    'jenis_arus_kas' => $request->jenis_arus_kas,
                    'ref2' => $request->ref2,
                    'uraian' => $request->uraian,
                    'ref3' => $request->ref3,
                    'tahun_anggaran' => $request->tahun_anggaran,
                    'anggaran' => $anggaran,
                    'status_laporan' => $request->status_laporan,
                    'user_id' => $request->user_id
                ]);

                TotalSaldo::create([
                    'jenis_laporan' => 'arus_kas',
                    'kode_unik' => $arus_kas->kode_unik,
                    'ref' => $request->ref2,
                    'sub_total' => $request->total,
                    'tahun_anggaran' => $request->tahun_anggaran,
                    'bulan' => $request->bulan,
                    'minggu' => $request->minggu
                ]);
            } else {
                ArusKas::create([
                    'kode_unik' => $kode_unik,
                    'jenis_laporan' => $request->jenis_laporan,
                    'ref1' => $request->ref1,
                    'jenis_arus_kas' => $request->jenis_arus_kas,
                    'ref2' => $request->ref2,
                    'uraian' => $request->uraian,
                    'ref3' => $request->ref3,
                    'tahun_anggaran' => $request->tahun_anggaran,
                    'anggaran' => $request->total,
                    'status_laporan' => $request->status_laporan,
                    'user_id' => $request->user_id
                ]);

                TotalSaldo::create([
                    'jenis_laporan' => 'arus_kas',
                    'kode_unik' => $kode_unik,
                    'ref' => $request->ref2,
                    'sub_total' => $request->total,
                    'tahun_anggaran' => $request->tahun_anggaran,
                    'bulan' => $request->bulan,
                    'minggu' => $request->minggu
                ]);
            }
        }

        return redirect()->back()->with(['success' => 'Data Ditambahkan!']);
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\ArusKas  $arusKas
    * @return \Illuminate\Http\Response
    */
    public function show(ArusKas $arusKas)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\ArusKas  $arusKas
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $user = User::where('username', '=', Auth::user()->username)->select('id as user_id')->first();
        $kodeRekening = KodeRekening::select('id as rekening_id', 'kode_rekening.*')
        ->where('jenis_rekening', '=', 'arus_kas')
        ->orderBy('kode_rekening', 'ASC')
        ->get();

        $edit = TotalSaldo::join('arus_kas', 'total_saldo.ref', '=', 'arus_kas.ref2')
        ->where('total_saldo.id', '=', $id)
        ->select(
            'total_saldo.id as total_saldo_id',
            'total_saldo.*',
            'arus_kas.*'
        )->first();
        $TahunAnggaran = $edit->tahun_anggaran;

        if ($TahunAnggaran == null) {
            $arus_kas = ArusKas::select('id as arus_kas_id', 'arus_kas.*')->where('tahun_anggaran', '=', date('Y'))->get();
        } elseif ($TahunAnggaran != null) {
            $arus_kas = ArusKas::select('id as arus_kas_id', 'arus_kas.*')->where('tahun_anggaran', '=', $TahunAnggaran)->get();
        }

        $data = [
            'jenis_laporan' => array(),
            'data' => array(),
        ];
        $jenis_laporan = [];
        foreach($arus_kas as $k => $val) {
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
            foreach($arus_kas as $key => $val) {
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
                                'kode_unik' => $val->kode_unik,
                                'arus_kas_id' => $val->arus_kas_id,
                                'ref1' => $val->ref1,
                                'jenis_arus_kas' => $val->jenis_arus_kas,
                                'ref2' => $val->ref2,
                                'uraian' => $val->uraian,
                                'ref3' => $val->ref3,
                                'tahun_anggaran' => $val->tahun_anggaran,
                                'anggaran' => $val->anggaran,
                            ];
                        } elseif ($val->jenis_arus_kas == 'Arus Keluar Kas') {
                            $data['data'][$val->jenis_laporan]['ref_arus_keluar'] = $val->ref2;
                            $data['data'][$val->jenis_laporan]['jenis_arus_kas']['arus_keluar'] = [
                                'arus_kas_id' => $val->arus_kas_id,
                                'jenis_laporan' => $val->jenis_laporan,
                                'kode_unik' => $val->kode_unik,
                                'ref1' => $val->ref1,
                                'jenis_arus_kas' => $val->jenis_arus_kas,
                                'ref2' => $val->ref2,
                                'uraian' => $val->uraian,
                                'ref3' => $val->ref3,
                                'tahun_anggaran' => $val->tahun_anggaran,
                                'anggaran' => $val->anggaran,
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
                                'kode_unik' => $val->kode_unik,
                                'ref1' => $val->ref1,
                                'jenis_arus_kas' => $val->jenis_arus_kas,
                                'ref2' => $val->ref2,
                                'uraian' => $val->uraian,
                                'ref3' => $val->ref3,
                                'tahun_anggaran' => $val->tahun_anggaran,
                                'anggaran' => $val->anggaran,
                            ]);
                        } elseif ($val->jenis_arus_kas == 'Arus Keluar Kas') {
                            $data['data'][$val->jenis_laporan]['ref_arus_keluar'] = $val->ref2;
                            array_push($data['data'][$val->jenis_laporan]['jenis_arus_kas']['arus_keluar'], [
                                'arus_kas_id' => $val->arus_kas_id,
                                'jenis_laporan' => $val->jenis_laporan,
                                'kode_unik' => $val->kode_unik,
                                'ref1' => $val->ref1,
                                'jenis_arus_kas' => $val->jenis_arus_kas,
                                'ref2' => $val->ref2,
                                'uraian' => $val->uraian,
                                'ref3' => $val->ref3,
                                'tahun_anggaran' => $val->tahun_anggaran,
                                'anggaran' => $val->anggaran,
                            ]);
                        }
                    }
                }
            }
        }

        $arus_kas = $data['data'];
        $get_tahun = ArusKas::select('tahun_anggaran')->groupBy('tahun_anggaran')->orderBy('tahun_anggaran', 'DESC')->limit('10')->get();
        $tahun = isset($get_tahun) ? $get_tahun : [];
        $tahun1 = isset($data['tahun1']) ? $data['tahun1'] : null;
        $tahun2 = isset($data['tahun1']) ? ($data['tahun1']-1) : null;
        $bulans = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

        // mengambil nilai tahun, bulan dan minggu
        $get_bulan = $edit->bulan == null ? null : $edit->bulan;
        $get_minggu = $edit->minggu == null ? null : $edit->minggu;

        return view('admin.ArusKas.arus_kas', compact('user','kodeRekening', 'arus_kas', 'tahun', 'tahun1', 'tahun2', 'bulans', 'TahunAnggaran', 'get_bulan', 'get_minggu', 'edit'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateArusKasRequest  $request
    * @param  \App\Models\ArusKas  $arusKas
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $total_saldo = TotalSaldo::findOrFail($id);

        $total_saldo->update([
            'ref' => $request->ref2,
            'sub_total' => $request->anggaran,
            'tahun_anggaran' => $request->tahun_anggaran,
            'bulan' => $request->bulan,
            'minggu' => $request->minggu
        ]);

        $anggaran = TotalSaldo::select('sub_total')->where('ref', '=', $request->ref2)->where('tahun_anggaran', '=', $total_saldo->tahun_anggaran)->sum('sub_total');
        $arus_kas = ArusKas::where('kode_unik', '=', $total_saldo->kode_unik)->first();

        $arus_kas->update([
            'jenis_laporan' => $request->jenis_laporan,
            'ref1' => $request->ref1,
            'jenis_arus_kas' => $request->jenis_arus_kas,
            'ref2' => $request->ref2,
            'uraian' => $request->uraian,
            'ref3' => $request->ref3,
            'tahun_anggaran' => $request->tahun_anggaran,
            'anggaran' => $anggaran,
            'status_laporan' => $request->status_laporan,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('arus-kas-admin.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function export($tahun = null, $bulan = null)
    {

    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\ArusKas  $arusKas
    * @return \Illuminate\Http\Response
    */

    public function destroyTotalSaldo($id)
    {
        $total_saldo = TotalSaldo::findOrFail($id);
        $arus_kas = ArusKas::where('kode_unik', '=', $total_saldo->kode_unik)->first();
        $total_saldo->delete();
        $anggaran = TotalSaldo::select('sub_total')->where('ref', '=', $total_saldo->ref)->where('tahun_anggaran', '=', $total_saldo->tahun_anggaran)->sum('sub_total');
        $arus_kas->update([
            'anggaran' => $anggaran
        ]);

        return redirect()->back()->with(['success' => 'Saldo Kas Dihapus!']);
    }

    public function destroy($id)
    {
        $arus_kas = ArusKas::findOrFail($id);
        $arus_kas->delete();

        return redirect()->back()->with(['success' => 'Data Dihapus!']);
    }
}

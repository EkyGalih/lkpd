<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\Models\Apbd;
use App\Models\KodeRekening;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tahun = null)
    {
        $tahun = $tahun == null ? date('Y') : $tahun;

        $user = User::where('username', '=', Auth::user()->username)->select('id as user_id')->first();
        $kodeRekening = KodeRekening::select('id as kode_rek_id', 'kode_rekening.*')->orderBy('kode_rekening', 'ASC')->get();

        $CekApbd = Apbd::select('id as apbd_id', 'apbd.*')
                ->orderBy('kode_rekening', 'ASC')
                ->where('tahun_anggaran', '=', $tahun)
                ->get();

        if ($CekApbd->isEmpty()) {
            $Apbd = Apbd::select('id as apbd_id', 'apbd.*')
                ->orderBy('kode_rekening', 'ASC')
                ->where('tahun_anggaran', '=', $tahun-1)
                ->get();
        } else {
            $Apbd = Apbd::select('id as apbd_id', 'apbd.*')
                ->orderBy('kode_rekening', 'ASC')
                ->where('tahun_anggaran', '=', $tahun)
                ->get();
        }

        $data = [
            'nama_rekening' => array(),
            'data' => array(),
        ];
        $nama_rekening = [];
        foreach ($Apbd as $k => $val) {
            if (!isset($nama_rekening[$val->nama_rekening])) {
                $nama_rekening[$val->nama_rekening] = [];
            }
        }
        $kode_rekening = [];
        foreach ($Apbd as $k => $val) {
            if (!isset($kode_rekening[$val->kode_rekening])) {
                $kode_rekening[$val->kode_rekening] = [];
            }
        }

        $c_sort = count($nama_rekening);
        $i = 0;
        if (is_array($nama_rekening) && ($c_sort > 0)) {
            foreach ($nama_rekening as $k => $v) {
                array_push($data['nama_rekening'], $k);
                $kode = $Apbd->where('nama_rekening', '=', $k)->first();
                $data['data'][$k] = array(
                    'kode_rekening' => $kode->kode_rekening,
                    'nama_rekening' => $k,
                    'data' => array()
                );
            }

            foreach ($Apbd as $key => $val) {
                if (in_array($val->nama_rekening, $data['nama_rekening'])) {
                    if (!isset($data['data'][$val->nama_rekening]['data'])) {
                        $data['tahun_anggaran'] = $val->tahun_anggaran;
                        $data['data'][$val->nama_rekening]['data'] = [
                            'apbd_id'               => $val->apbd_id,
                            'kode_rekening'         => $val->kode_rekening,
                            'nama_rekening'         => $val->nama_rekening,
                            'uraian'                => $val->uraian,
                            'sub_uraian'            => $val->sub_uraian,
                            'jml_anggaran_sebelum'  => $val->jml_anggaran_sebelum,
                            'jml_anggaran_setelah'  => $val->jml_anggaran_setelah,
                            'selisih_anggaran'      => $val->selisih_anggaran,
                            'tahun_anggaran'        => $val->tahun_anggaran,
                            'persen'                => $val->persen
                        ];
                    } else {
                        $data['tahun_anggaran'] = $val->tahun_anggaran;
                        array_push($data['data'][$val->nama_rekening]['data'], [
                            'apbd_id'               => $val->apbd_id,
                            'kode_rekening'         => $val->kode_rekening,
                            'nama_rekening'         => $val->nama_rekening,
                            'uraian'                => $val->uraian,
                            'sub_uraian'            => $val->sub_uraian,
                            'jml_anggaran_sebelum'  => $val->jml_anggaran_sebelum,
                            'jml_anggaran_setelah'  => $val->jml_anggaran_setelah,
                            'selisih_anggaran'      => $val->selisih_anggaran,
                            'tahun_anggaran'        => $val->tahun_anggaran,
                            'persen'                => $val->persen
                        ]);
                    }
                }
            }
        }
        $Apbd = $data['data'];
        $get_tahun = Apbd::select('tahun_anggaran')->groupBy('tahun_anggaran')->orderBy('tahun_anggaran', 'DESC')->get();
        $tahun_anggaran = isset($data['tahun_anggaran']) ? $data['tahun_anggaran'] : date('Y');

        return view('pimpinan.Apbd.apbd', compact('user', 'Apbd', 'kodeRekening', 'get_tahun', 'tahun_anggaran'));
    }
}

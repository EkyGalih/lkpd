<?php

namespace App\Http\Controllers\Pegawai;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Apbd;
use App\Models\IkuRealisasi;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    public function index()
    {
        $User = Helpers::Users(Auth::user()->id);
        $apbd = Apbd::get();
        $iku  = IkuRealisasi::select('indikator_kinerja_id','target','target_tercapai')->get();

        $pagu = [
            'pad' => [
                'anggaran' => array(),
                'selisih' => array(),
                'perubahan' => array()
            ],
            'belanja' => [
                'anggaran' => array(),
                'selisih' => array(),
                'perubahan' => array()
            ],
            'pembiayaan' => [
                'anggaran' => array(),
                'selisih' => array(),
                'perubahan' => array()
            ]
        ];

        foreach($apbd as $item)
        {
            if ($item->nama_rekening == 'PENDAPATAN DAERAH' && strlen($item->kode_rekening) == 3)
            {
                array_push($pagu['pad']['anggaran'], $item->jml_anggaran_sebelum);
                array_push($pagu['pad']['selisih'], $item->selisih_anggaran);
                array_push($pagu['pad']['perubahan'], $item->jml_anggaran_setelah);
            } elseif ($item->nama_rekening == 'BELANJA' && strlen($item->kode_rekening) == 3)
            {
                array_push($pagu['belanja']['anggaran'], $item->jml_anggaran_sebelum);
                array_push($pagu['belanja']['selisih'], $item->selisih_anggaran);
                array_push($pagu['belanja']['perubahan'], $item->jml_anggaran_setelah);
            } elseif ($item->nama_rekening == 'PEMBIAYAAN' && strlen($item->kode_rekening) == 3)
            {
                array_push($pagu['pembiayaan']['anggaran'], $item->jml_anggaran_sebelum);
                array_push($pagu['pembiayaan']['selisih'], $item->selisih_anggaran);
                array_push($pagu['pembiayaan']['perubahan'], $item->jml_anggaran_perubahan);
            }
        }

        // data anggaran pad
        $PadAnggaran = array_sum($pagu['pad']['anggaran']);
        $PadPerubahan = array_sum($pagu['pad']['perubahan']);
        $PadSelisih = array_sum($pagu['pad']['selisih']);

        // data anggaran belanja
        $BelanjaAnggaran = array_sum($pagu['belanja']['anggaran']);
        $BelanjaPerubahan = array_sum($pagu['belanja']['perubahan']);
        $BelanjaSelisih = array_sum($pagu['belanja']['selisih']);

        // data anggaran pembiayaan
        $BiayaAnggaran = array_sum($pagu['pembiayaan']['anggaran']);
        $BiayaPerubahan = array_sum($pagu['pembiayaan']['perubahan']);
        $BiayaSelisih = array_sum($pagu['pembiayaan']['selisih']);

        $jadwals = Schedule::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'asc')->paginate(4);
        return view('pegawai.beranda.beranda', compact('User','jadwals','iku','PadAnggaran','PadPerubahan','PadSelisih','BelanjaAnggaran','BelanjaPerubahan','BelanjaSelisih','BiayaAnggaran','BiayaPerubahan','BiayaSelisih'));
    }
}

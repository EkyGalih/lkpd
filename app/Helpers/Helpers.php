<?php

namespace App\Helpers;

use App\Models\Apbd;
use App\Models\Divisi;
use App\Models\IndikatorKinerja;
use App\Models\KodeRekening;
use App\Models\LaporanRealisasiAnggaran;
use App\Models\ProgramAnggaran;
use App\Models\SasaranStrategis;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;

class Helpers extends Facade
{
    public static function GetDate($param)
    {
        $explode    = explode(" ", $param);
        $date       = explode("-", $explode[0]);

        if ($date[1] == '01') {
            $date = 'Jan '.$date[2].", ".$date[0];
        } elseif ($date[1] == '02') {
            $date = 'Feb '.$date[2].", ".$date[0];
        } elseif ($date[1] == '03') {
            $date = 'Mar '.$date[2].", ".$date[0];
        } elseif ($date[1] == '04') {
            $date = 'Apr '.$date[2].", ".$date[0];
        } elseif ($date[1] == '05') {
            $date = 'Mei '.$date[2].", ".$date[0];
        } elseif ($date[1] == '06') {
            $date = 'Jun '.$date[2].", ".$date[0];
        } elseif ($date[1] == '07') {
            $date = 'Jul '.$date[2].", ".$date[0];
        } elseif ($date[1] == '08') {
            $date = 'Aug '.$date[2].", ".$date[0];
        } elseif ($date[1] == '09') {
            $date = 'Sep '.$date[2].", ".$date[0];
        } elseif ($date[1] == '10') {
            $date = 'Oct '.$date[2].", ".$date[0];
        } elseif ($date[1] == '11') {
            $date = 'Nov '.$date[2].", ".$date[0];
        } elseif ($date[1] == '12') {
            $date = 'Dec '.$date[2].", ".$date[0];
        }
        return $date;
    }

    public static function GetTime($param)
    {
        return Date('g:i A', strtotime($param));
    }

    public static function GenerateString($param)
    {
        return bin2hex(random_bytes($param));
    }

    // function user access
    public static function Role()
    {
        $role = User::where('id', '=', Auth::user()->id)->first();

        if ($role)
        return $role->jenis_pegawai;
    }

    public static function CurrencyConvert($data)
    {
        $explode = explode(".", $data);
        $implode = implode("", $explode);
        return $implode;
    }

    public static function CurrencyConvertComa($data)
    {
        $explode = explode(",", $data);
        $implode = implode("", $explode);
        return $implode;
    }

    public static function ConvertPersen($persen)
    {
        if ($persen < 0 ) {
            $persen = abs(round($persen));
        } else {
            $persen = round($persen);
        }
        return $persen;
    }

    // ================================
    //          KODE REKENING
    // ===============================

    public static function GetKodeRekening()
    {
        return KodeRekening::select('id', 'kode_rekening', 'nama_rekening')->orderBy('kode_rekening', 'ASC')->get();
    }

    public static function GetSubKode()
    {
        $KodeRekening = [
            "kode_rekening" => array(),
            "nama_rekening" => array()
        ];
        $Get = KodeRekening::select('id', 'kode_rekening', 'nama_rekening')->orderBy('kode_rekening', 'ASC')->get();

        foreach ($Get as $item)
        {
            if (strlen($item->kode_rekening) > 3) {
                array_push($KodeRekening["kode_rekening"], $item->kode_rekening);
                array_push($KodeRekening["nama_rekening"], $item->nama_rekening);
            }
        }
        return $KodeRekening;

    }

    // ================================
    //              APBD
    // ===============================

    public static function GetApbdTahun($TahunAnggaran, $KodeRekening)
    {
        $apbd = Apbd::select('jml_anggaran_setelah','kode_rekening', 'nama_rekening', 'tahun_anggaran')
                ->where('kode_rekening', '=', $KodeRekening)
                ->where('tahun_anggaran', '=', $TahunAnggaran)
                ->first();
        return $apbd;
    }

    public static function SumSubAPBD($TahunAnggaran, $KodeRekening)
    {

        $Apbd = Apbd::where('tahun_anggaran', '=', $TahunAnggaran)
                    ->where('kode_rekening', 'LIKE', $KodeRekening.'%')
                    ->select('jml_anggaran_setelah','kode_rekening')
                    ->get();
        $sum = [];

        foreach ($Apbd as $item) {
            if (strlen($item->kode_rekening) > 3) {
                array_push($sum, $item->jml_anggaran_setelah);
            }
        }

        return array_sum($sum);
    }

    public static function GetSumSubAPBD($TahunAnggaran, $KodeRekening)
    {
        $Apbd = Apbd::select('jml_anggaran_setelah','kode_rekening', 'nama_rekening', 'tahun_anggaran')
                ->where('tahun_anggaran', '=', $TahunAnggaran)
                ->where('kode_rekening', 'LIKE', $KodeRekening.'%')
                ->orderBy('tahun_anggaran', 'ASC')
                ->get();

        $sum = [];

        foreach ($Apbd as $item) {
            if (strlen($item->kode_rekening) > 3) {
                array_push($sum, $item->jml_anggaran_setelah);
            }
        }

        return array_sum($sum);
    }

    // ================================
    //         REALISASI ANGGARAN
    // ===============================

    public static function SumSubLRA($kode_rekening)
    {
        return LaporanRealisasiAnggaran::where('kode_rekening', 'Like', $kode_rekening.'%')
                                        ->select('anggaran_terealisasi')
                                        ->sum('anggaran_terealisasi');
    }

    // ================================
    //          IKU REALISASI
    // ===============================

    public static function GetSasaran()
    {
        $tahun = date('Y');
        return SasaranStrategis::select('id as sasaran_id', 'sasaran_strategis.*')->where('created_at', 'LIKE', $tahun.'%')->get();
    }

    public static function GetIK()
    {
        $tahun = date('Y');
        return IndikatorKinerja::select('id as ik_id', 'indikator_kinerja.indikator_kinerja')->where('created_at', 'LIKE', $tahun.'%')->get();
    }

    public static function GetProgramAnggaran()
    {
        $years = date('Y');
        return ProgramAnggaran::select('id as program_anggaran_id', 'program_anggaran_iku.*')
        ->where('created_at', 'LIKE', $years.'%')
        ->orderBy('created_at', 'ASC')
        ->get();
    }

    // ================================
    //              TOOLS
    // ===============================

    public static function GetDivisi()
    {
        return Divisi::select('id as divisi_id', 'divisi.*')->get();
    }

}

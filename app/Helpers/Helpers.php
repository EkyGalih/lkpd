<?php

namespace App\Helpers;

use App\Models\LaporanRealisasiAnggaran;
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

    // Realisasi Anggaran
    public static function SumSubLRA($kode_rekening)
    {
        return LaporanRealisasiAnggaran::where('kode_rekening', 'Like', $kode_rekening.'%')
                                        ->select('anggaran_terealisasi')
                                        ->sum('anggaran_terealisasi');
    }

}

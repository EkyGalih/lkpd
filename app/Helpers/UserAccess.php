<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserAccess
{
    public static function getRole()
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
}

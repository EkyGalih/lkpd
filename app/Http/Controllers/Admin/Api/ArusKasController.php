<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\ArusKas;

class ArusKasController extends Controller
{
    public function subTotal1($ref1, $ref2, $tahun)
    {
        $subTotal = ArusKas::where('ref1', '=', $ref1)->where('ref2', '=', $ref2)->where('tahun_anggaran', '=', $tahun)
        ->sum('anggaran');
        return $subTotal;
    }

    public function subTotal2($ref1, $ref2, $tahun)
    {
        $subTotal = ArusKas::where('ref1', '=', $ref1)->where('ref2', '=', $ref2)->where('tahun_anggaran_sebelum', '=', $tahun)
        ->sum('anggaran_tahun_sebelum');
        return $subTotal;
    }

    public function Total1($tahun)
    {
        $total = ArusKas::where('tahun_anggaran', '=', $tahun)
        ->sum('anggaran');
        return $total;
    }

    public function Total2($tahun)
    {
        $total = ArusKas::where('tahun_anggaran_sebelum', '=', $tahun)
        ->sum('anggaran_tahun_sebelum');
        return $total;
    }
}

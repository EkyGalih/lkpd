<?php

namespace App\Http\Controllers\Pimpinan;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Pegawai = Helpers::UsersLimit(10);

        return view('Pimpinan.Pegawai.pegawai', compact('Pegawai'));
    }
}

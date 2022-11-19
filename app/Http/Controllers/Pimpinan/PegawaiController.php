<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\User;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Pegawai = User::select('id as user_id', 'users.*')
        ->orderBy('created_at', 'DESC')
        ->paginate(10);

        return view('pimpinan.Pegawai.pegawai', compact('Pegawai', 'Divisi'));
    }
}

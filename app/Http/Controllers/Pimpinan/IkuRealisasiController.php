<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\Models\IkuRealisasi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IkuRealisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::select('id as user_id')->where('id', '=', Auth::user()->id)->first();

        $IkuRealisasi = IkuRealisasi::select('id as iku_realisasi_id', 'iku_realisasi.*')->orderBy('created_at', 'ASC')->where('created_at', 'LIKE', date('Y').'%')->paginate(10);

        return view('Pimpinan.iku_realisasi.Components.iku_realisasi', compact('IkuRealisasi', 'user'));
    }
}

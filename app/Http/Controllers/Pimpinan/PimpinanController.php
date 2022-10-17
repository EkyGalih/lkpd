<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PimpinanController extends Controller
{
    public function index()
    {
        $jadwal = Schedule::where('user_id', '=', Auth::user()->id)->get();
        return view('Pimpinan.beranda.beranda', compact('jadwal'));
    }
}

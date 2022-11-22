<?php

namespace App\Http\Controllers\Pimpinan;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PimpinanController extends Controller
{
    public function index()
    {
        $User = Helpers::UsersById(Auth::user()->id);
        $jadwal = Schedule::where('user_id', '=', Auth::user()->id)->get();
        return view('Pimpinan.beranda.beranda', compact('jadwal', 'User'));
    }
}

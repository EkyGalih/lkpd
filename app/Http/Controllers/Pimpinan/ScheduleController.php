<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\User;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwals = Schedule::select('id as schedule_id', 'schedule.*')->orderBy('created_at', 'DESC')->where('status', '=', '0')->get();
        $users = User::select('id as user_id', 'nama')->get();
        return view('Pimpinan.Schedule.schedule', compact('jadwals', 'users'));
    }
}

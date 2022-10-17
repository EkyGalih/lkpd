<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SaldoAnggaran;
use App\Http\Requests\StoreSaldoAnggaranRequest;
use App\Http\Requests\UpdateSaldoAnggaranRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SaldoAnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('username', '=', Auth::user()->username)->select('id as realisasi_id')->first();
        return view('admin.SaldoAnggaran.saldo-anggaran', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSaldoAnggaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSaldoAnggaranRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SaldoAnggaran  $saldoAnggaran
     * @return \Illuminate\Http\Response
     */
    public function show(SaldoAnggaran $saldoAnggaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SaldoAnggaran  $saldoAnggaran
     * @return \Illuminate\Http\Response
     */
    public function edit(SaldoAnggaran $saldoAnggaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSaldoAnggaranRequest  $request
     * @param  \App\Models\SaldoAnggaran  $saldoAnggaran
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSaldoAnggaranRequest $request, SaldoAnggaran $saldoAnggaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SaldoAnggaran  $saldoAnggaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaldoAnggaran $saldoAnggaran)
    {
        //
    }
}

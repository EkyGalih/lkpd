<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Neraca;
use App\Http\Requests\StoreNeracaRequest;
use App\Http\Requests\UpdateNeracaRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NeracaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('username', '=', Auth::user()->username)->select('id as realisasi_id')->first();
        return view('admin.Neraca.neraca', compact('user'));
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
     * @param  \App\Http\Requests\StoreNeracaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNeracaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Neraca  $neraca
     * @return \Illuminate\Http\Response
     */
    public function show(Neraca $neraca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Neraca  $neraca
     * @return \Illuminate\Http\Response
     */
    public function edit(Neraca $neraca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNeracaRequest  $request
     * @param  \App\Models\Neraca  $neraca
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNeracaRequest $request, Neraca $neraca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Neraca  $neraca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Neraca $neraca)
    {
        //
    }
}

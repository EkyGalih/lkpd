<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ekuitas;
use App\Http\Requests\StoreEkuitasRequest;
use App\Http\Requests\UpdateEkuitasRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EkuitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('username', '=', Auth::user()->username)->select('id as realisasi_id')->first();
        return view('admin.Ekuitas.ekuitas', compact('user'));
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
     * @param  \App\Http\Requests\StoreEkuitasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEkuitasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ekuitas  $ekuitas
     * @return \Illuminate\Http\Response
     */
    public function show(Ekuitas $ekuitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ekuitas  $ekuitas
     * @return \Illuminate\Http\Response
     */
    public function edit(Ekuitas $ekuitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEkuitasRequest  $request
     * @param  \App\Models\Ekuitas  $ekuitas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEkuitasRequest $request, Ekuitas $ekuitas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ekuitas  $ekuitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ekuitas $ekuitas)
    {
        //
    }
}

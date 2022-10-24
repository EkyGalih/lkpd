<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Operasional;
use App\Http\Requests\StoreOperasionalRequest;
use App\Http\Requests\UpdateOperasionalRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OperasionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('username', '=', Auth::user()->username)->select('id as realisasi_id')->first();
        return view('admin.Operasional.operasional', compact('user'));
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
     * @param  \App\Http\Requests\StoreOperasionalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOperasionalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operasional  $operasional
     * @return \Illuminate\Http\Response
     */
    public function show(Operasional $operasional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operasional  $operasional
     * @return \Illuminate\Http\Response
     */
    public function edit(Operasional $operasional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOperasionalRequest  $request
     * @param  \App\Models\Operasional  $operasional
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOperasionalRequest $request, Operasional $operasional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operasional  $operasional
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operasional $operasional)
    {
        //
    }
}

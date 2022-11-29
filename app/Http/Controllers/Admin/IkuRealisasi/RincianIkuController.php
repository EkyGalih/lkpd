<?php

namespace App\Http\Controllers\Admin\IkuRealisasi;

use App\Http\Controllers\Controller;
use App\Imports\RincianIkuImports;
use App\Models\KegiatanIku;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RincianIkuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $KegiatanIku = KegiatanIku::where('tahun', '=', date('Y'))->groupby('divisi_id')->orderBy('divisi_id', 'DESC')->get();
        return view('admin.iku_realisasi.Components.rincian_iku', compact('KegiatanIku'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function import(Request $request)
    {

        $file = $request->file('file-iku');
        $nama_file = rand() . '-' . $file->getClientOriginalName();
        $file->move('import_data/iku', $nama_file);
        Excel::import(new RincianIkuImports, public_path('import_data/iku/'.$nama_file));

        return redirect()->route('rincian-iku-admin')->with(['success' => 'Rincian Iku berhasil diupload!']);
    }
}

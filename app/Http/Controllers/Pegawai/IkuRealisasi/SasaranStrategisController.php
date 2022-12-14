<?php

namespace App\Http\Controllers\Pegawai\IkuRealisasi;

use App\Http\Controllers\Controller;
use App\Models\SasaranStrategis;
use Illuminate\Http\Request;

class SasaranStrategisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SasaranStrategis = SasaranStrategis::select('id as sasaran_id', 'sasaran_strategis.sasaran_strategis')->where('created_at', 'LIKE', date('Y').'%')->paginate(10);

        return view('pegawai.iku_realisasi.Components.sasaran-strategis', compact('SasaranStrategis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SasaranStrategis::create(['sasaran_strategis' => $request->sasaran_strategis]);

        return redirect()->route('iku-sasaran-pegawai')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $SasaranStrategis = SasaranStrategis::findOrFail($id);

        $SasaranStrategis->update(['sasaran_strategis' => $request->sasaran_strategis]);

        return redirect()->route('iku-sasaran-pegawai')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $SasaranStrategis = SasaranStrategis::findOrFail($id);
        $SasaranStrategis->delete();

        return redirect()->route('iku-sasaran-pegawai')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

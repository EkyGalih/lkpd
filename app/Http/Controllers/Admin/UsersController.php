<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Webpatser\Uuid\Uuid;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Pengguna = User::select('id as user_id', 'users.*')
        ->orderBy('created_at', 'DESC')
        ->paginate(10);
        $Divisi = Divisi::select('id as divisi_id', 'divisi.nama_divisi', 'divisi.alias_divisi')->get();

        return view('admin.Pengguna.pengguna', compact('Pengguna', 'Divisi'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'id' => (string)Uuid::generate(4),
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jenis_pegawai' => $request->jenis_pegawai,
            'divisi_id' => $request->divisi_id
        ]);

        return redirect()->route('admin-pengguna')->with(['success' => 'Pengguna Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {
        $Profile = User::select('id as user_id', 'users.*')->where('id', '=', $id)->first();

        return view('admin.Profile.profile', compact('Profile'));
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
        $Pengguna = User::findOrFail($id);

        $Pengguna->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jenis_pegawai' => $request->jenis_pegawai,
            'divisi_id' => $request->divisi_id
        ]);

        return redirect()->route('admin-pengguna')->with(['success' => 'Pengguna Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Pengguna = User::findOrFail($id);
        $Pengguna->delete();

        return redirect()->route('admin-pengguna')->with(['success' => 'Pengguna Berhasil Dihapus!']);
    }
}

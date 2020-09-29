<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'user_id' => 'required',
            'nama_lengkap' => 'required',
            'nip' => 'required',
            'no_hp' => 'required',
            'instansi' => 'required',
            'alamat' => 'required',
            'jk' => 'required',
            'foto' => 'required|file|image|mimes:png,jpg,jpeg',
        ]);

        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'images';
        $file->move($tujuan_upload,$nama_file);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->back()
        ->with('success','Data Profil berhasil di simpan');
    }
}

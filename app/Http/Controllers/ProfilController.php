<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Guru;
use App\Siswa;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function profilGuru()
    {
      return view('profilguru.profil');
    }

    public function storeProfilGuru(Request $request)
    {
      $this->validate($request,[
            'user_id' => 'required',
            'nama_lengkap' => 'required',
            'nomor_induk' => 'required',
            'jk' => 'required',
            'foto' => 'required|file|image|mimes:png,jpg,jpeg',
        ]);

        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'images';
        $file->move($tujuan_upload,$nama_file);

        $profil = Guru::create([
            'user_id' => $request->user_id,
            'nama_lengkap' => $request->nama_lengkap,
            'nomor_induk' => $request->nomor_induk,
            'jk' => $request->jk,
            'foto' => $nama_file,
        ]);
        return redirect()->back()
        ->with('success','Data Profil berhasil di simpan');
    }
    public function editProfilGuru()
    {
        $guru = Guru::find(Auth::user()->guru->id);
        return view('profilguru/editProfilGuru',['guru' => $guru]);
    }

    public function updateProfilGuru(Request $request)
    {
        $this->validate($request,[
            'user_id' => 'required',
            'nama_lengkap' => 'required',
            'nomor_induk' => 'required',
            'jk' => 'required',
            'foto' => 'nullable|file|image|mimes:png,jpg,jpeg',
        ]);

        $guru = Guru::find(Auth::user()->guru->id); //tampilkan profil
        $nama_file= $guru->foto; //simpan nama file foto yang sudah ada

        if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'images';
        $file->move($tujuan_upload,$nama_file);
        }
        $update = [
            'user_id' => $request->user_id,
            'nama_lengkap' => $request->nama_lengkap,
            'nomor_induk' => $request->nomor_induk,
            'jk' => $request->jk,
            'foto' => $nama_file,
        ];

        Guru::whereId($guru->id)->update($update);
        return redirect()->route('profilGuru')->with('success','Data Profil berhasil di update');
    }



// BAGIAN SISWA
    public function profilSiswa()
    {
      return view('profilsiswa.profil');
    }

    public function storeProfilSiswa(Request $request)
    {
      $this->validate($request,[
            'user_id' => 'required',
            'nama_lengkap' => 'required',
            'nomor_induk' => 'required',
            'jk' => 'required',
            'foto' => 'required|file|image|mimes:png,jpg,jpeg',
        ]);

        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'images';
        $file->move($tujuan_upload,$nama_file);

        $profil = Siswa::create([
            'user_id' => $request->user_id,
            'nama_lengkap' => $request->nama_lengkap,
            'nomor_induk' => $request->nomor_induk,
            'jk' => $request->jk,
            'foto' => $nama_file,
        ]);
        return redirect()->back()
        ->with('success','Data Profil berhasil di simpan');
    }

    public function editProfilSiswa()
    {
        $siswa = Siswa::find(Auth::user()->siswa->id);
        return view('profilsiswa/editProfilSiswa',['siswa' => $siswa]);
    }

    public function updateProfilSiswa(Request $request)
    {
        $this->validate($request,[
            'user_id' => 'required',
            'nama_lengkap' => 'required',
            'nomor_induk' => 'required',
            'jk' => 'required',
            'foto' => 'nullable|file|image|mimes:png,jpg,jpeg',
        ]);

        $siswa= Siswa::find(Auth::user()->siswa->id); //tampilkan profil
        $nama_file= $siswa->foto; //simpan nama file foto yang sudah ada

        if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'images';
        $file->move($tujuan_upload,$nama_file);
        }
        $update = [
            'user_id' => $request->user_id,
            'nama_lengkap' => $request->nama_lengkap,
            'nomor_induk' => $request->nomor_induk,
            'jk' => $request->jk,
            'foto' => $nama_file,
        ];

        Siswa::whereId($siswa->id)->update($update);
        return redirect()->route('profilSiswa')->with('success','Data Profil berhasil di update');
    }
}

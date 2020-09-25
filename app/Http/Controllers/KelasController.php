<?php

namespace App\Http\Controllers;
use Auth;
use Str;
use App\Guru;
use App\AnggotaKelas;
use App\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function getKelas()
    {
      try {
        $kelas         = Kelas::where('guru_id',Auth::user()->guru->id)->get();
        return view('kelas.getKelas',['kelas' => $kelas]);
      } catch (\Exception $e) {
        return redirect()->route('profilGuru')->with('error','Mohon lengkapi profil anda');
      }

    }

    public function createKelas()
    {
      try {
        $guru = Guru::where('user_id',auth()->user()->id)->first();
        return view('kelas.createKelas');
      } catch (\Exception $e) {
        return redirect()->route('profilGuru')->with('error','Mohon lengkapi profil anda');
      }
    }

    public function storeKelas(Request $request)
    {
        $kode_kelas = Str::random(6);
        $guru_id = Auth::user()->guru->id;
        $kelas = Kelas::create([
            'guru_id' => $guru_id,
            'nama_kelas' => $request->nama_kelas,
            'deskripsi' => $request->deskripsi,
            'kode_kelas' => $kode_kelas,
        ]);
        //dd('oke');
        return redirect()->route('createKelas')->with('success','Kelas baru berhasil dibuat');
    }

    public function showKelas($id)
    {
        $kelas           = Kelas::find($id);
        $anggotakelas    = AnggotaKelas::where('kelas_id',$id)->join('siswa','anggota_kelas.siswa_id','=','siswa.id')
                          ->orderBy('siswa.nama_lengkap')->get();


        return view('kelas.showKelas', compact('kelas','anggotakelas'));
    }


}

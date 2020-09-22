<?php

namespace App\Http\Controllers;
use Auth;
use App\Kelas;
use App\AnggotaKelas;
use Illuminate\Http\Request;

class AnggotaKelasController extends Controller
{
  public function getKelasSiswa()
  {
    try {
      $anggotaKelas = AnggotaKelas::where('siswa_id',Auth::user()->siswa->id)->get();
      return view('anggotakelas.getKelasSiswa',['anggotaKelas' => $anggotaKelas]);
    } catch (\Exception $e) {
      return redirect()->route('profilSiswa')->with('error','Mohon lengkapi profil anda');
    }
  }

  public function gabungKelas(Request $request)
    {
        // try {
        if (Kelas::where('kode_kelas',$request->kode_kelas)) {
            $anggotaKelas = new AnggotaKelas;
            $anggotaKelas->siswa_id = auth()->user()->siswa->id;
            $idkelas = Kelas::where('kode_kelas',$request->kode_kelas)->value('id');
            // foreach ($idkelas as $item) {
            //     $id = $item->id;
            // }
            $anggotaKelas->kelas_id = $idkelas;

            if (AnggotaKelas::where('kelas_id',$idkelas)->where('siswa_id',auth()->user()->siswa->id)->exists()) {
                return redirect()->route('getKelasSiswa')->withSuccess('Kamu sudah tergabung dalam kelas ini');
            } else {
                $anggotaKelas->save();
                return redirect()->route('getKelasSiswa')->withSuccess('Berhasil bergabung ke kelas baru');
            }
        }

        // } catch (\Exception $e) {
        //   return redirect()->back()->with('tidakditemukan','Kode Kelas tidak ditemukan');
        // }
    }


}

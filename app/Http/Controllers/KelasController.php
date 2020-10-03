<?php

namespace App\Http\Controllers;
use Auth;
use Str;
use App\Guru;
use App\AnggotaKelas;
use App\Kelas;
use App\PesertaUjian;
use App\HasilUjian;
use App\Ujian;
use Illuminate\Http\Request;

class KelasController extends Controller
{

  //Bagian Guru
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
        $ujian = Ujian::where('kelas_id',$id)->where('isdelete',0)->get();

        return view('kelas.showKelas', compact('kelas','anggotakelas','ujian'));
    }

    //Bagian Siswa
    public function getKelasSiswa()
    {
      try {
        $anggotaKelas = AnggotaKelas::where('siswa_id',Auth::user()->siswa->id)->get();
        return view('anggotakelas.getKelasSiswa',['anggotaKelas' => $anggotaKelas]);
      } catch (\Exception $e) {
        return redirect()->route('siswa.profil')->with('error','Mohon lengkapi profil anda');
      }

    }

    public function gabungKelasSiswa(Request $request)
    {
        if (Kelas::where('kode_kelas',$request->kode_kelas)) {
            $anggotaKelas = new AnggotaKelas;
            $anggotaKelas->siswa_id = auth()->user()->siswa->id;
            $idkelas = Kelas::where('kode_kelas',$request->kode_kelas)->get();
            foreach ($idkelas as $item) {
                $id = $item->id;
            }
            $anggotaKelas->kelas_id = $id;

            if (AnggotaKelas::where('kelas_id',$id)->where('siswa_id',auth()->user()->siswa->id)->exists()) {
                return redirect()->route('getKelasSiswa')->withSuccess('Kamu sudah tergabung dalam kelas ini');
            } else {
                $anggotaKelas->save();
                return redirect()->route('getKelasSiswa')->withSuccess('Berhasil bergabung ke kelas baru');
            }
        }

    }
    public function showKelasSiswa($id)
    {

        $kelas              = Kelas::find($id);
        $anggotakelas       = AnggotaKelas::where('kelas_id',$id)->join('siswa','anggota_kelas.siswa_id','=','siswa.id')
                            ->orderBy('siswa.nama_lengkap')->get();
        $siswa_id                   = auth()->user()->siswa->id;
        $anggota_kelas_id           = AnggotaKelas::where('siswa_id',$siswa_id)->where('kelas_id',$id)->value('id');
        
        $hasil_ujian               = PesertaUjian::where('anggota_kelas_id',$anggota_kelas_id)->where('status',1)->get();
        return view('anggotakelas.showKelasSiswa', ['anggotakelas' => $anggotakelas, 'hasil_ujian'=> $hasil_ujian], compact('kelas'));
    }

    public function hasilUjian($id){
      $peserta_ujian = PesertaUjian::find($id);
      $hasil_ujian = HasilUjian::where('peserta_ujian_id', $peserta_ujian->id)->get();
      
      return view('anggotakelas.hasilUjian', ['peserta_ujian' => $peserta_ujian, 'hasil_ujian' => $hasil_ujian]);
    }


}

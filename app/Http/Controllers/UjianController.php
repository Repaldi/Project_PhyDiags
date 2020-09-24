<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Guru;
use App\AnggotaKelas;
use App\Kelas;
use App\PaketSoal;
use App\Ujian;
use App\PesertaUjian;

class UjianController extends Controller
{

    //METHOD MILIK GURU -----------------------------------------------------------------------
    public function getUjian()
    {
        $ujian = Ujian::where('guru_id',auth()->user()->guru->id)->where('isdelete',0)->paginate(8);
        return view('ujian.getUjian',compact('ujian'));
    }
    public function createUjian()
    {
        $kelas      = Kelas::where('guru_id',auth()->user()->guru->id)->get();
        $paket_soal = PaketSoal::where('guru_id',auth()->user()->guru->id)->where('isdelete',false)->get();
        return view('ujian.createUjian', compact('kelas','paket_soal'));
    }
    public function storeUjian(Request $request)
    {
        $anggota_kelas = AnggotaKelas::where('kelas_id',$request->kelas_id)->get();
        $ujian = new Ujian;
        $ujian->guru_id = auth()->user()->guru->id;
        $ujian->kelas_id = $request->kelas_id; 
        $ujian->paket_soal_id = $request->paket_soal_id;
        $ujian->nama_ujian = $request->nama_ujian;
        $ujian->deskripsi = $request->deskripsi; 
        $ujian->status = 0;
        $ujian->isdelete = false;
        $ujian->save();

        foreach ($anggota_kelas as $e => $anggota) {
            $data['ujian_id'] = $ujian->id;
            $data['anggota_kelas_id'] = $anggota->id;
            $data['keterangan'] = '';
            $data['status'] = 0;

            PesertaUjian::create($data);
        }
        return redirect()->route('createUjian');
    }
    public function showUjian($id){
        $ujian          = Ujian::find($id);
        $peserta_ujian  = PesertaUjian::where('ujian_id',$id)->get();
        return view('ujian.showUjian',compact(['ujian','peserta_ujian']));
    }

    public function deleteUjian($id)
    {
        $ujian = Ujian::find($id);
        $ujian->update([
            'isdelete' => true,
        ]);

        return redirect()->back()->with('success','Berhasil menghapus ujian');
    }

    //---------------------------------------------------------------------------------------
}

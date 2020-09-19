<?php

namespace App\Http\Controllers;
use Auth;
use App\PaketSoal;
use Illuminate\Http\Request;

class PaketSoalController extends Controller
{
    public function getPaketSoal()
    {
      $paket_soal = PaketSoal::where('guru_id',auth()->user()->guru->id)->paginate(8);
      return view('paket_soal.getPaketSoal',compact(['paket_soal']));
    }

    public function createPaketSoal()
    {
      return view('paket_soal.createPaketSoal');
    }

    public function storePaketSoal(Request $request)
    {
        $guru_id = Auth::user()->guru->id;
        $paketsoal = PaketSoal::create([
            'guru_id' => $guru_id,
            'nama_paket_soal' => $request->nama_paket_soal,
            'isdelete' => false,
        ]);
        dd("oke");
        return redirect()->route('getPaketSoal')->with('success','Paket Soal baru berhasil dibuat');
    }
}

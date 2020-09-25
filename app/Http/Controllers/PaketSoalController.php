<?php

namespace App\Http\Controllers;
use Auth;
use App\PaketSoal;
use App\SoalSatuan;
use App\SoalTk1;
use App\SoalTk2;
use App\SoalTk3;
use App\SoalTk4;
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
        return redirect()->route('getPaketSoal')->with('success','Paket Soal baru berhasil dibuat');
    }

    public function soalSatuan($id)
    {
        $paket_soal = PaketSoal::find($id);
        return view('paket_soal.soalSatuan', compact('paket_soal'));
    }
 
    public function storeSoalSatuan(Request $request)
    {
        $soal_satuan = new SoalSatuan;
        $soal_satuan->paket_soal_id =  $request->paket_soal_id;
        $soal_satuan->indikator     =  $request->indikator;
        $soal_satuan->isdelete      = false;
        $soal_satuan->save();
        $soal_satuan_id = $soal_satuan->id;
        return redirect()->route('soalTingkat',$soal_satuan_id);
    }
    public function soalTingkat($id)
    {
        $soal_satuan = SoalSatuan::find($id);
        $soal_tk1 = SoalTk1::where('soal_satuan_id',$id)->first();
        $soal_tk2 = SoalTk2::where('soal_satuan_id',$id)->first();
        $soal_tk3 = SoalTk3::where('soal_satuan_id',$id)->first();
        $soal_tk4 = SoalTk4::where('soal_satuan_id',$id)->first();
        return view('paket_soal.soalTingkat', compact('soal_satuan','soal_tk1','soal_tk2','soal_tk3','soal_tk4'));
    }

    public function storeSoalTk1(Request $request)
    {
        $this->validate($request,['gambar' => 'required|file|image|mimes:png,jpg,jpeg|max:2048']);
        $file = $request->file('gambar');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'images';
        $file->move($tujuan_upload,$nama_file);

        $soal_tk1 = SoalTk1::create([
            'soal_satuan_id' => $request->soal_satuan_id,
            'pertanyaan' => $request->pertanyaan,
            'pil_a' => $request->pil_a,
            'pil_b' => $request->pil_b,
            'pil_c' => $request->pil_c,
            'pil_d' => $request->pil_d,
            'kunci' => $request->kunci,
            'gambar' => $nama_file,
        ]);
        $soal_satuan_id = $request->soal_satuan_id;
        return redirect()->route('soalTingkat',$soal_satuan_id)->with('success','Soal Tingkat 1 berhasil dibuat');;
    }

    public function storeSoalTk2(Request $request)
    {
        $soal_tk2 = SoalTk2::create([
            'soal_satuan_id' => $request->soal_satuan_id,
            'pertanyaan' => $request->pertanyaan,
            'pil_a' => $request->pil_a,
            'pil_b' => $request->pil_b,
            'kunci' => $request->kunci,
        ]);
        $soal_satuan_id = $request->soal_satuan_id;
        return redirect()->route('soalTingkat',$soal_satuan_id)->with('success','Soal Tingkat 2 berhasil dibuat');;
    }
    
    public function storeSoalTk3(Request $request)
    {
        $this->validate($request,['gambar' => 'required|file|image|mimes:png,jpg,jpeg|max:2048']);
        $file = $request->file('gambar');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'images';
        $file->move($tujuan_upload,$nama_file);

        $soal_tk3 = SoalTk3::create([
            'soal_satuan_id' => $request->soal_satuan_id,
            'pertanyaan' => $request->pertanyaan,
            'pil_a' => $request->pil_a,
            'pil_b' => $request->pil_b,
            'pil_c' => $request->pil_c,
            'pil_d' => $request->pil_d,
            'kunci' => $request->kunci,
            'gambar' => $nama_file,
        ]);
        $soal_satuan_id = $request->soal_satuan_id;
        return redirect()->route('soalTingkat',$soal_satuan_id)->with('success','Soal Tingkat 3 berhasil dibuat');;
    }

    public function storeSoalTk4(Request $request)
    {
        $soal_tk4 = SoalTk2::create([
            'soal_satuan_id' => $request->soal_satuan_id,
            'pertanyaan' => $request->pertanyaan,
            'pil_a' => $request->pil_a,
            'pil_b' => $request->pil_b,
            'kunci' => $request->kunci,
        ]);
        $soal_satuan_id = $request->soal_satuan_id;
        return redirect()->route('soalTingkat',$soal_satuan_id)->with('success','Soal Tingkat 4 berhasil dibuat');;
    }
    
}


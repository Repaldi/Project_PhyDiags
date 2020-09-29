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
use File;

class PaketSoalController extends Controller
{
    public function getPaketSoal()
    {
        $paket_soal = PaketSoal::where('guru_id',auth()->user()->guru->id)->where('isdelete',false)->paginate(8);
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

    public function deletePaketSoal($id)
    {
      $paket_soal = PaketSoal::find($id);
      $paket_soal->update([
        'isdelete'=>true
      ]);

      return redirect()->back();
    }

    public function soalSatuan($id)
    {
        $paket_soal = PaketSoal::find($id);
        $soal_satuan = SoalSatuan::where('paket_soal_id',$id)->get();
        return view('paket_soal.soalSatuan', compact('paket_soal','soal_satuan'));
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
    public function soalTingkat($id, PaketSoal $paket_soal)
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
        $this->validate($request,['gambar' => 'required|file|image|mimes:png,jpg,jpeg,gif']);
        $file = $request->file('gambar');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'images/soal';
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

    //Ubah Soal TK1
    public function updateSoalTk1(Request $request, $paket_soal_id){
        $paket_soal = PaketSoal::findorFail($paket_soal_id);
        
        $soal_tk1      = SoalTk1::findorFail($request->id);
        $nama_file= $soal_tk1->gambar; //simpan nama file gambar yang sudah ada

        if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'images/soal';
        $file->move($tujuan_upload,$nama_file);
        File::delete('images/soal'.$soal_tk1->gambar);
        }
            $update = [
                'soal_satuan_id' => $request->soal_satuan_id,
                'pertanyaan' => $request->pertanyaan,
                'pil_a' => $request->pil_a,
                'pil_b' => $request->pil_b,
                'pil_c' => $request->pil_c,
                'pil_d' => $request->pil_d,
                'gambar' => $nama_file,
                'kunci' => $request->kunci,
            ];
      
            SoalTk1::whereId($soal_tk1->id)->update($update);
            return redirect()->back()->with('success','Soal berhasil diupdate !');   

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
    //Ubah Soal TK2
    public function updateSoalTk2(Request $request, $paket_soal_id){
        $paket_soal = PaketSoal::findorFail($paket_soal_id);
        $soal_tk2      = SoalTk2::findorFail($request->id);
    
            $update = [
                'soal_satuan_id' => $request->soal_satuan_id,
                'pertanyaan' => $request->pertanyaan,
                'pil_a' => $request->pil_a,
                'pil_b' => $request->pil_b,
                'kunci' => $request->kunci,
            ];
      
            SoalTk2::whereId($soal_tk2->id)->update($update);
            return redirect()->back()->with('success','Soal berhasil diupdate !');   

    }

    public function storeSoalTk3(Request $request)
    {
        $this->validate($request,['gambar' => 'required|file|image|mimes:png,jpg,jpeg,gif|max:2048']);
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

    //Ubah Soal TK3
    public function updateSoalTk3(Request $request, $paket_soal_id){
        $paket_soal = PaketSoal::findorFail($paket_soal_id);
        
        $soal_tk3      = SoalTk3::findorFail($request->id);
        $nama_file= $soal_tk3->gambar; //simpan nama file gambar yang sudah ada

        if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'images/soal';
        $file->move($tujuan_upload,$nama_file);
        File::delete('images/soal'.$soal_tk3->gambar);
        }
            $update = [
                'soal_satuan_id' => $request->soal_satuan_id,
                'pertanyaan' => $request->pertanyaan,
                'pil_a' => $request->pil_a,
                'pil_b' => $request->pil_b,
                'pil_c' => $request->pil_c,
                'pil_d' => $request->pil_d,
                'gambar' => $nama_file,
                'kunci' => $request->kunci,
            ];
      
            SoalTk3::whereId($soal_tk3->id)->update($update);
            return redirect()->back()->with('success','Soal berhasil diupdate !');   

    }


    public function storeSoalTk4(Request $request)
    {
        $soal_tk4 = SoalTk4::create([
            'soal_satuan_id' => $request->soal_satuan_id,
            'pertanyaan' => $request->pertanyaan,
            'pil_a' => $request->pil_a,
            'pil_b' => $request->pil_b,
            'kunci' => $request->kunci,
        ]);
        $soal_satuan_id = $request->soal_satuan_id;
        return redirect()->route('soalTingkat',$soal_satuan_id)->with('success','Soal Tingkat 4 berhasil dibuat');;
    }
    //Ubah Soal TK4
    public function updateSoalTk4(Request $request, $paket_soal_id){
        $paket_soal = PaketSoal::findorFail($paket_soal_id);
        $soal_tk4     = SoalTk4::findorFail($request->id);
    
            $update = [
                'soal_satuan_id' => $request->soal_satuan_id,
                'pertanyaan' => $request->pertanyaan,
                'pil_a' => $request->pil_a,
                'pil_b' => $request->pil_b,
                'kunci' => $request->kunci,
            ];
      
            SoalTk4::whereId($soal_tk4->id)->update($update);
            return redirect()->back()->with('success','Soal berhasil diupdate !');   

    }

}

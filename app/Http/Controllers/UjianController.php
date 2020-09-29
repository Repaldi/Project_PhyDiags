<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Auth;
use App\Guru;
use App\AnggotaKelas;
use App\Kelas;
use App\PaketSoal;
use App\Ujian;
use App\SoalSatuan;
use App\PesertaUjian;
use App\SoalTk1;
use App\SoalTk2;
use App\SoalTk3;
use App\SoalTk4;
use App\JawabanTk1;
use App\JawabanTk2;
use App\JawabanTk3;
use App\JawabanTk4;
use App\HasilUjian;

class UjianController extends Controller
{

    //METHOD MILIK GURU -----------------------------------------------------------------------
    public function getUjian()
    {
        $ujian = Ujian::where('guru_id',auth()->user()->guru->id)->where('isdelete',0)->paginate(8);
        return view('ujian.guru.getUjian',compact('ujian'));
    }
    public function createUjian()
    {
        $kelas      = Kelas::where('guru_id',auth()->user()->guru->id)->get();
        $paket_soal = PaketSoal::where('guru_id',auth()->user()->guru->id)->where('isdelete',false)->get();
        return view('ujian.guru.createUjian', compact('kelas','paket_soal'));
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
            $data['siswa_id'] = $anggota->siswa_id;
            $data['keterangan'] = '';
            $data['status'] = 0;

            PesertaUjian::create($data);
        }
        return redirect()->route('getUjian');
    }
    public function showUjian($id){
        $ujian          = Ujian::find($id);
        $peserta_ujian  = PesertaUjian::where('ujian_id',$id)->paginate(10);
        return view('ujian.guru.showUjian',compact(['ujian','peserta_ujian']));
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
    // METHOD UJIAN SISWA
    public function getUjianSiswa()
    {
        $ujian_saya = PesertaUjian::where('siswa_id',auth()->user()->siswa->id)
                      ->where('status',0)->where('isdelete',0)->get();
        return view('ujian.siswa.getUjianSiswa',compact('ujian_saya'));
    }

    public function runUjian($id)
    {
      $peserta_ujian    = PesertaUjian::find($id);
      $ujian            = Ujian::where('id',$peserta_ujian->ujian_id)->first();
      $paket_soal_id    = $ujian->paket_soal_id;
      $paket_soal       = PaketSoal::where('id',$paket_soal_id)->get();
      $soal_satuan      = SoalSatuan::where('paket_soal_id',$paket_soal_id)->orderBy('id','asc')->paginate(1);

      return view('ujian.siswa.runUjian',compact(['ujian','peserta_ujian','paket_soal_id','paket_soal','soal_satuan']));
    }

    public function fetch_data(Request $request){
        $peserta_ujian  = PesertaUjian::find($request->peserta_ujian_id);
        $ujian          = Ujian::where('id',$peserta_ujian->ujian_id)->first();
        $paket_soal_id  = $ujian->paket_soal_id;
        $paket_soal     = PaketSoal::where('id',$paket_soal_id)->get();
        $soal_satuan    = SoalSatuan::where('paket_soal_id',$paket_soal_id)->orderBy('id','asc')->paginate(1);
        if($request->ajax())
        {
            return view('ujian.siswa.pagination_data', ['soal_satuan' => $soal_satuan, 'ujian' => $ujian, 'peserta_ujian' => $peserta_ujian ], compact('paket_soal_id'))->render();
        }
    }

    public function finishUjian($id)
    {
        $peserta_ujian          = PesertaUjian::find($id);
        $update_finish_peserta  = [
            'status' => 1,
        ];
        PesertaUjian::where('id', $id)->update($update_finish_peserta);
        return redirect()->route('getUjianSiswa')->with('info','Ujian telah diselesaikan, jawaban anda telah tersimpan !');
    }
    public function storeJawabanTk1(Request $request)
    {
        $this->validate($request,[
            'ujian_id' => 'required',
            'peserta_ujian_id' => 'required',
            'soal_tk1_id' => 'required',
            'jawab_tk1' => 'required',
            'kode' => 'required',
        ]);
        $check_jawaban = JawabanTk1::where('peserta_ujian_id', $request->peserta_ujian_id)
                                    ->where('soal_tk1_id', $request->soal_tk1_id)->first();
        if (!$check_jawaban) {
            $posts = JawabanTk1::create([
                'peserta_ujian_id' => $request->peserta_ujian_id,
                'soal_tk1_id' => $request->soal_tk1_id,
                'jawaban' => $request->jawab_tk1,
                'kode' => $request->kode,
            ]);

        } elseif ($check_jawaban) {
            $update_jawaban_tk1 = [
                'peserta_ujian_id' => $request->peserta_ujian_id,
                'soal_tk1_id' => $request->soal_tk1_id,
                'jawaban' => $request->jawab_tk1,
                'kode' => $request->kode,
            ];
            $posts = JawabanTk1::where('peserta_ujian_id', $request->peserta_ujian_id)
                                 ->where('soal_tk1_id', $request->soal_tk1_id)->update($update_jawaban_tk1);
        }
        return response()->json($posts);
    }

    public function storeJawabanTk2(Request $request)
    {
        $this->validate($request,[
            'ujian_id' => 'required',
            'peserta_ujian_id' => 'required',
            'soal_tk2_id' => 'required',
            'jawab_tk2' => 'required',
            'kode' => 'required',
        ]);
        $check_jawaban = JawabanTk2::where('peserta_ujian_id', $request->peserta_ujian_id)
                                    ->where('soal_tk2_id', $request->soal_tk2_id)->first();
        if (!$check_jawaban) {
            $posts = JawabanTk2::create([
                'peserta_ujian_id' => $request->peserta_ujian_id,
                'soal_tk2_id' => $request->soal_tk2_id,
                'jawaban' => $request->jawab_tk2,
                'kode' => $request->kode,
            ]);

        } elseif ($check_jawaban) {
            $update_jawaban_tk2 = [
                'peserta_ujian_id' => $request->peserta_ujian_id,
                'soal_tk2_id' => $request->soal_tk2_id,
                'jawaban' => $request->jawab_tk2,
                'kode' => $request->kode,
            ];
            $posts = JawabanTk2::where('peserta_ujian_id', $request->peserta_ujian_id)
                                 ->where('soal_tk2_id', $request->soal_tk2_id)->update($update_jawaban_tk2);
        }
        return response()->json($posts);
    }

    public function storeJawabanTk3(Request $request)
    {
        $this->validate($request,[
            'ujian_id' => 'required',
            'peserta_ujian_id' => 'required',
            'soal_tk3_id' => 'required',
            'jawab_tk3' => 'required',
            'kode' => 'required',
        ]);
        $check_jawaban = JawabanTk3::where('peserta_ujian_id', $request->peserta_ujian_id)
                                    ->where('soal_tk3_id', $request->soal_tk3_id)->first();
        if (!$check_jawaban) {
            $posts = JawabanTk3::create([
                'peserta_ujian_id' => $request->peserta_ujian_id,
                'soal_tk3_id' => $request->soal_tk3_id,
                'jawaban' => $request->jawab_tk3,
                'kode' => $request->kode,
            ]);

        } elseif ($check_jawaban) {
            $update_jawaban_tk3 = [
                'peserta_ujian_id' => $request->peserta_ujian_id,
                'soal_tk3_id' => $request->soal_tk3_id,
                'jawaban' => $request->jawab_tk3,
                'kode' => $request->kode,
            ];
            $posts = JawabanTk3::where('peserta_ujian_id', $request->peserta_ujian_id)
                                 ->where('soal_tk3_id', $request->soal_tk3_id)->update($update_jawaban_tk3);
        }
        return response()->json($posts);
    }

    public function storeJawabanTk4(Request $request)
    {
        $this->validate($request,[
            'ujian_id' => 'required',
            'peserta_ujian_id' => 'required',
            'soal_tk4_id' => 'required',
            'jawab_tk4' => 'required',
            'kode' => 'required',
        ]);
        $check_jawaban = JawabanTk4::where('peserta_ujian_id', $request->peserta_ujian_id)
                                    ->where('soal_tk4_id', $request->soal_tk4_id)->first();
        if (!$check_jawaban) {
            $posts = JawabanTk4::create([
                'peserta_ujian_id' => $request->peserta_ujian_id,
                'soal_tk4_id' => $request->soal_tk4_id,
                'jawaban' => $request->jawab_tk4,
                'kode' => $request->kode,
            ]);

        } elseif ($check_jawaban) {
            $update_jawaban_tk4 = [
                'peserta_ujian_id' => $request->peserta_ujian_id,
                'soal_tk4_id' => $request->soal_tk4_id,
                'jawaban' => $request->jawab_tk4,
                'kode' => $request->kode,
            ];
            $posts = JawabanTk4::where('peserta_ujian_id', $request->peserta_ujian_id)
                                 ->where('soal_tk4_id', $request->soal_tk4_id)->update($update_jawaban_tk4);
        }
        return response()->json($posts);
    }

    public function storeHasilUjian(Request $request)
    {
        $this->validate($request,[
            'peserta_ujian_id' => 'required',
            'soal_satuan_id' => 'required',
        ]);
        $soal_tk1_id = SoalTk1::where('soal_satuan_id',$request->soal_satuan_id)->value('id');
        $soal_tk2_id = SoalTk2::where('soal_satuan_id',$request->soal_satuan_id)->value('id');
        $soal_tk3_id = SoalTk3::where('soal_satuan_id',$request->soal_satuan_id)->value('id');
        $soal_tk4_id = SoalTk4::where('soal_satuan_id',$request->soal_satuan_id)->value('id');

        $jawaban_tk1 = JawabanTk1::where('soal_tk1_id',$soal_tk1_id)->where('peserta_ujian_id',$request->peserta_ujian_id)->first();
        $jawaban_tk2 = JawabanTk2::where('soal_tk2_id',$soal_tk2_id)->where('peserta_ujian_id',$request->peserta_ujian_id)->first();
        $jawaban_tk3 = JawabanTk3::where('soal_tk3_id',$soal_tk3_id)->where('peserta_ujian_id',$request->peserta_ujian_id)->first();
        $jawaban_tk4 = JawabanTk4::where('soal_tk4_id',$soal_tk4_id)->where('peserta_ujian_id',$request->peserta_ujian_id)->first();

        if (!$jawaban_tk1) { $jawaban_tk1_kode = 0; $jawaban_tk1_id = null;} else {$jawaban_tk1_kode = $jawaban_tk1->kode; $jawaban_tk1_id = $jawaban_tk1->id; }
        if (!$jawaban_tk2) { $jawaban_tk2_kode = 0; $jawaban_tk2_id = null;} else {$jawaban_tk2_kode = $jawaban_tk2->kode; $jawaban_tk2_id = $jawaban_tk2->id;}
        if (!$jawaban_tk3) { $jawaban_tk3_kode = 0; $jawaban_tk3_id = null;} else {$jawaban_tk3_kode = $jawaban_tk3->kode; $jawaban_tk3_id = $jawaban_tk3->id;}
        if (!$jawaban_tk4) { $jawaban_tk4_kode = 0; $jawaban_tk4_id = null;} else {$jawaban_tk4_kode = $jawaban_tk4->kode; $jawaban_tk4_id = $jawaban_tk4->id;}

        if ($jawaban_tk1_kode == 1) {
            if ($jawaban_tk2_kode == 1) {
                if ($jawaban_tk3_kode == 1) {
                    if ($jawaban_tk4_kode == 1) {
                        $hasil = "SC";  $keterangan = "Scientific" ;// 1111
                    } else {
                        $hasil = "LK";  $keterangan = "Lack of Knowledge" ;// 1110
                    }
                } else {
                    if ($jawaban_tk4_kode == 1) {
                        $hasil = "FP";  $keterangan = "False Positive" ;// 1101
                    } else {
                        $hasil = "LK";  $keterangan = "Lack of Knowledge" ;// 1100
                    }
                }
            } else {
                if ($jawaban_tk3_kode == 1) {
                    if ($jawaban_tk4_kode == 1) {
                        $hasil = "LK"; $keterangan = "Lack of Knowledge"; // 1011
                    } else {
                        $hasil = "LK";  $keterangan = "Lack of Knowledge"; // 1010
                    }
                } else {
                    if ($jawaban_tk4_kode == 1) {
                        $hasil = "LK";  $keterangan = "Lack of Knowledge" ;// 1001
                    } else {
                        $hasil = "LK";  $keterangan = "Lack of Knowledge"; // 1000
                    }
                }
            }
        } else {
            if ($jawaban_tk2_kode == 1) {
                if ($jawaban_tk3_kode == 1) {
                    if ($jawaban_tk4_kode == 1) {
                        $hasil = "FN";  $keterangan = "False Negative" ;// 0111
                    } else {
                        $hasil = "LK";  $keterangan = "Lack of Knowledge" ;// 0110
                    }
                } else {
                    if ($jawaban_tk4_kode == 1) {
                        $hasil = "MSC";  $keterangan = "Misconception" ;// 0101
                    } else {
                        $hasil = "LK";  $keterangan = "Lack of Knowledge" ;// 0100
                    }
                }
            } else {
                if ($jawaban_tk3_kode == 1) {
                    if ($jawaban_tk4->kode == 1) {
                        $hasil = "LK";  $keterangan = "Lack of Knowledge"; // 0011
                    } else {
                        $hasil = "LK";  $keterangan = "Lack of Knowledge"; // 0010
                    }
                } else {
                    if ($jawaban_tk4_kode == 1) {
                        $hasil = "LK";  $keterangan = "Lack of Knowledge"; // 0001
                    } else {
                        $hasil = "LK";  $keterangan = "Lack of Knowledge" ;// 0000
                    }
                }
            }
        }

        $check_hasil = HasilUjian::where('peserta_ujian_id', $request->peserta_ujian_id)
                        ->where('soal_satuan_id', $request->soal_satuan_id)->first();
        if (!$check_hasil) {
            $posts = HasilUjian::create([
                'peserta_ujian_id' => $request->peserta_ujian_id,
                'soal_satuan_id' => $request->soal_satuan_id,
                'jawaban_tk1_id' => $jawaban_tk1_id,
                'jawaban_tk2_id' => $jawaban_tk2_id,
                'jawaban_tk3_id' => $jawaban_tk3_id,
                'jawaban_tk4_id' => $jawaban_tk4_id,
                'hasil' => $hasil,
                'keterangan' => $keterangan,
            ]);

        } elseif ($check_hasil) {
            $update_hasil_ujian = [
                'peserta_ujian_id' => $request->peserta_ujian_id,
                'soal_satuan_id' => $request->soal_satuan_id,
                'jawaban_tk1_id' => $jawaban_tk1_id,
                'jawaban_tk2_id' => $jawaban_tk2_id,
                'jawaban_tk3_id' => $jawaban_tk3_id,
                'jawaban_tk4_id' => $jawaban_tk4_id,
                'hasil' => $hasil,
                'keterangan' => $keterangan,
            ];
        $posts = HasilUjian::where('peserta_ujian_id', $request->peserta_ujian_id)
                ->where('soal_satuan_id', $request->soal_satuan_id)->update($update_hasil_ujian);
        }
        return response()->json($posts);
    }
}

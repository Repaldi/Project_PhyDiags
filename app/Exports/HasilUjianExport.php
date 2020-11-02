<?php

namespace App\Exports;

use App\Ujian;
use App\PesertaUjian;
// use Maatwebsite\Excel\Concerns\FromCollection;
use App\HasilUjian;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class HasilUjianExport implements FromView
{
    protected $id;

    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($id) {
        $this->id = $id;
        // $this->peserta_ujian = $peserta_ujian;

     }

     public function view(): View
     {
       //dd($this->id);
       $ujian = Ujian::find($this->id);
       $peserta_ujian = \App\PesertaUjian::where('ujian_id',$ujian->id)->get();
       // $peserta_ujian = \App\PesertaUjian::where('ujian_id',$ujian->id)->join('hasil_ujian','peserta_ujian.id','=','hasil_ujian.peserta_ujian_id')->orderBy('hasil_ujian.hasil','asc')->get();
       // $peserta_ujian = \App\PesertaUjian::where('ujian_id',$ujian->id)->selectRaw('peserta_ujian.*,hasil_ujian.hasil as hasil')->join('hasil_ujian','peserta_ujian.id','=','hasil_ujian.peserta_ujian_id')->orderBy('hasil_ujian.hasil','asc')->get();
       // $peserta_ujian->unique();
       // $peserta_ujian = \App\PesertaUjian::where('ujian_id',$ujian->id)->join('hasil_ujian','peserta_ujian.id','=','hasil_ujian.peserta_ujian_id')->orderBy('hasil_ujian.hasil','asc')->get();
       // $peserta_ujian->unique('peserta_ujian.id');
       // $peserta_ujian = \App\PesertaUjian::where('ujian_id',$ujian->id)->with('hasil_ujian')->select()->orderBy('hasil_ujian.hasil','asc')->get();
       // $peserta_ujian = PesertaUjian::where('ujian_id',$ujian->id)->addSelect(['hasil'=>HasilUjian::select('hasil')->whereColumn('peserta_ujian_id','peserta_ujian.id')->limit(1)])->orderBy('hasil','asc')->get();
       // dd($peserta_ujian);


       return view('ujian.guru.excel', [
            'ujian' => $ujian,
            'peserta_ujian' => $peserta_ujian
        ]);
     }
    // public function collection()
    // {
    //   $ujian = Ujian::find($this->id);
    //   $peserta_ujian = \App\PesertaUjian::where('ujian_id',$ujian->id)->get();
    //   return ['ujian'=>$ujian,'peserta_ujian'=>$peserta_ujian];
    // }
}

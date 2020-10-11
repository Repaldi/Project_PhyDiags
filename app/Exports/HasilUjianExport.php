<?php

namespace App\Exports;

use App\Ujian;
// use Maatwebsite\Excel\Concerns\FromCollection;
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

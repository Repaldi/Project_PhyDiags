<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JawabanTk1 extends Model
{
    protected $table = "jawaban_tk1";
    protected $guarded = [];


    public function soal_tk1()
    {
      return $this->belongsTo(SoalTk1::class);
    }

    public function peserta_ujian()
    {
      return $this->belongsTo(PesertaUjian::class);
    }
}

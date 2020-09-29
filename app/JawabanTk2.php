<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JawabanTk2 extends Model
{
    protected $table = "jawaban_tk2";
    protected $guarded = [];


    public function soal_tk2()
    {
      return $this->belongsTo(SoalTk2::class);
    }

    public function peserta_ujian()
    {
      return $this->belongsTo(PesertaUjian::class);
    }
    public function hasil_ujian()
    {
      return $this->hasOne(HasilUjian::class);
    }
}

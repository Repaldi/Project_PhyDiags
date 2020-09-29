<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JawabanTk3 extends Model
{
    protected $table = "jawaban_tk3";
    protected $guarded = [];


    public function soal_tk3()
    {
      return $this->belongsTo(SoalTk3::class);
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

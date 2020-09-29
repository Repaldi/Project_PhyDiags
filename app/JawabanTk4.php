<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JawabanTk4 extends Model
{
    protected $table = "jawaban_tk4";
    protected $guarded = [];


    public function soal_tk4()
    {
      return $this->belongsTo(SoalTk4::class);
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

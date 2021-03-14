<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilUjian extends Model
{
    protected $table = "hasil_ujian";
    protected $guarded = [];

    public function peserta_ujian()
    {
      return $this->belongsTo(PesertaUjian::class);
    }
    public function soal_satuan()
    {
      return $this->belongsTo(SoalSatuan::class);
    }
    public function jawaban_tk1()
    {
      return $this->belongsTo(JawabanTk1::class);
    }
    public function jawaban_tk2()
    {
      return $this->belongsTo(JawabanTk2::class);
    }
    public function jawaban_tk3()
    {
      return $this->belongsTo(JawabanTk3::class);
    }
    public function jawaban_tk4()
    {
      return $this->belongsTo(JawabanTk4::class);
    }

    public function miskonsepsi()
    {
        return $this->belongsTo(Miskonsepsi::class);
    }
}

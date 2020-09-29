<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalSatuan extends Model
{
    protected $table = 'soal_satuan';
    protected $guarded = [];

    public function paket_soal()
    {
      return $this->belongsTo(PaketSoal::class);
    }
    public function soal_tk1()
    {
      return $this->hasOne(SoalTk1::class);
    }
    public function soal_tk2()
    {
      return $this->hasOne(SoalTk2::class);
    }
    public function soal_tk3()
    {
      return $this->hasOne(SoalTk3::class);
    }
    public function soal_tk4()
    {
      return $this->hasOne(SoalTk4::class);
    }
    public function hasil_ujian()
    {
      return $this->hasMany(HasilUjian::class);
    }
}

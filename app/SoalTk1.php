<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalTk1 extends Model
{
    protected $table = 'soal_tk1';
    protected $guarded = [];

    public function soal_satuan()
    {
      return $this->belongsTo(SoalSatuan::class);
    }

    public function jawaban_tk1()
    {
      return $this->hasOne(JawabanTk1::class);
    }

}

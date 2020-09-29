<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalTk2 extends Model
{
    protected $table = 'soal_tk2';
    protected $guarded = [];

    public function soal_satuan()
    {
      return $this->belongsTo(SoalSatuan::class);
    }

    public function jawaban_tk2()
    {
      return $this->hasOne(JawabanTk2::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalTk3 extends Model
{
    protected $table = 'soal_tk3';
    protected $guarded = [];

    public function soal_satuan()
    {
      return $this->belongsTo(SoalSatuan::class);
    }
}

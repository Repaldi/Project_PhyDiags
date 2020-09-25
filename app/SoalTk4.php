<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalTk4 extends Model
{
    protected $table = 'soal_tk4';
    protected $guarded = [];

    public function soal_satuan()
    {
      return $this->belongsTo(SoalSatuan::class);
    }
}

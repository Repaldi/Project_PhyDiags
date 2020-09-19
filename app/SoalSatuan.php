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
}

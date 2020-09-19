<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaketSoal extends Model
{
    protected $table = 'paket_soal';
    protected $guarded = [];

    public function soal_satuan()
    {
      return $this->hasMany(SoalSatuan::class);
    }
}

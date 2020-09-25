<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    protected $table = 'ujian';
    protected $guarded = [];

    public function kelas()
    {
      return $this->belongsTo(Kelas::class);
    }
    public function guru()
    {
      return $this->belongsTo(Guru::class);
    }
    public function paket_soal()
    {
      return $this->belongsTo(PaketSoal::class);
    }
    public function peserta_ujian(){
        return $this->hasMany(PesertaUjian::class,'ujian_id');
      }
}

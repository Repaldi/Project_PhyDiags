<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesertaUjian extends Model
{
    protected $table = 'peserta_ujian';
    protected $guarded = [];

    public function anggota_kelas()
    {
      return $this->belongsTo(AnggotaKelas::class);
    }
    public function ujian()
    {
      return $this->belongsTo(Ujian::class);
    }
    public function siswa(){
      return $this->belongsTo(Siswa::class);
    }
    public function hasil_ujian()
    {
      return $this->hasMany(HasilUjian::class);
    }
}

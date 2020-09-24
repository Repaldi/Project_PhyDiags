<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
  protected $table = 'siswa';
  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function anggota_kelas()
  {
  	return $this->hasMany(AnggotaKelas::class);
  }
}

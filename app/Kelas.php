<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
  protected $table = 'kelas';
  protected $guarded = [];

  public function guru() {
      return $this->belongsTo(Guru::class);
  }
  public function anggota_kelas(){
      return $this->hasMany(AnggotaKelas::class,'kelas_id');
  }
  public function pertemuan(){
      return $this->hasMany(Pertemuan::class,'kelas_id');
  }

  public function ujian(){
    return $this->hasMany(Ujian::class,'kelas_id');
  }

  public function jumlah_siswa()
  {
      $jumlah_siswa = AnggotaKelas::where('kelas_id',$this->id)->count();
      return $jumlah_siswa;
  }

}

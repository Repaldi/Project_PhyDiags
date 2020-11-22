<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $guarded = [];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function kelas()
    {
      return $this->hasMany(Kelas::class);
    }
    public function ujian(){
      return $this->hasMany(Ujian::class,'guru_id');
    }
    public function jumlah_kelas(){
      $guru_id  = $this->id;
      $jumlah_kelas = Kelas::where('guru_id',$guru_id)->count();
    
      // if($cek_guru->count() != null){
      // $jumlah_kelas = Kelas::where('guru_id',$guru_id)->count();
      // }else{
      //   $jumlah_kelas = 0;
      // }
     return $jumlah_kelas;
  }
  public function jumlah_ujian(){
      $guru_id  = $this->id;
      $jumlah_ujian = Ujian::where('guru_id',$guru_id)->where('isdelete',0)->count();
      return $jumlah_ujian;
  }
}

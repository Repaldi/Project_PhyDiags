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
}

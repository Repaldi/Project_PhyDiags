<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Miskonsepsi extends Model
{
    protected $table = 'miskonsepsi';
    protected $guarded = [];

    public function hasil_ujian()
    {
        return $this->hasMany(HasilUjian::class,'miskonsepsi_id','id');
    }
}

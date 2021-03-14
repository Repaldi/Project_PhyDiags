<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MiskonsepsiDetail extends Model
{
    protected $table = 'miskonsepsi_detail';
    protected $guarded = [];

    public function miskonsepsi()
    {
        return $this->belongsTo(Miskonsepsi::class);
    }


}

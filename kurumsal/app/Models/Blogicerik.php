<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blogicerik extends Model
{
    protected $guarded = [];

    public function kategoriler(){
        return $this->belongsTo(Blogkategori::class,'kategori_id','id');
     }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fotoFinca extends Model
{
    //
    public $timestamps = false;

    public function finca(){
        // una finca pertenece a una ciudad
        return $this->belongsTo(Finca::class);
    }

}
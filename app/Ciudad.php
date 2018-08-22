<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    public $timestamps = false;
    protected $fillable = ['descripcion'];

    /* Relacion  */
    public function fincas(){
        // una finca pertenece a una ciudad
        return $this->hasMany(Finca::class);
    }
   
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
            'descripcion', 'estado', 'fecha'
        ];
}

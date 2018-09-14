<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'nombre', 'email', 'telefono1', 'telefono2'
    ];


    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
            'fec_Reserva', 'fec_Ingreso',
            'fec_Salida', 'preCotizacion', 'requerimientos', 'cant_huespedes', 'estado', 'finca_id', 'cliente_id'
        ];

    public function finca(){
        // una finca pertenece a una ciudad
        return $this->belongsTo(Finca::class);
    }

    public function cliente(){
        // una finca pertenece a una Finca
        return $this->belongsTo(Cliente::class);
    }
}

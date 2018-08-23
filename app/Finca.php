<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finca extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'nombre', 'descripcion', 'precio_Tbaja', 
        'precio_Talta', 'direccion', 'cant_habitaciones', 'cant_banios', 
        'id_ciudad', 'id_via', 'sn_jacuzi', 'sn_piscina', 'slug'
    ];

    /* Relacion  */
    public function ciudad()
    {
        // una finca pertenece a una ciudad
        return $this->belongsTo(Ciudad::class);
    }

    public function via()
    {
        // una finca pertenece a una Via
        //return $this->belongsTo(Via::class);
        return $this->belongsTo(Via::class);
    }

    public function fotos()
    {
        return $this->hasMany(fotoFinca::class);
    }

}

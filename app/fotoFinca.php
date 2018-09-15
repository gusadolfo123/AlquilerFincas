<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fotoFinca extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'archivo', 'name', 'description', 'file_name', 'finca_id'
    ];

    public function finca(){
        // una finca pertenece a una Finca
        return $this->belongsTo(Finca::class);
    }

}

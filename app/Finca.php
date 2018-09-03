<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;


class Finca extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'nombre', 'descripcion', 'precio_Tbaja', 
        'precio_Talta', 'direccion', 'cant_habitaciones', 'cant_banios', 
        'ciudad_id', 'via_id', 'sn_jacuzi', 'sn_piscina', 'slug'
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
        return $this->belongsTo(Via::class);
    }

    public function fotos()
    {
        return $this->hasMany(fotoFinca::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function scopeFiltros($query, $data, $filtros)
    {
        if($data == null)
        {
            if($filtros == null)
                $resultado = $query;
            else{
                
                $via_id = (int)$filtros['via'];
                $resultado = $query->where([
                                            ['sn_jacuzi', filter_var($filtros['snJacuzi'], FILTER_VALIDATE_BOOLEAN)],
                                            ['sn_piscina', filter_var($filtros['snPiscina'], FILTER_VALIDATE_BOOLEAN)],
                                            ['cant_banios', '>=', (int)$filtros['banios']],
                                            ['cant_habitaciones', '>=', (int)$filtros['habitaciones']]
                                          ])
                                    ->whereHas('via', function($query) use ($via_id){
                                         $query->where('id', $via_id);
                                    });
            }

         
            return $resultado;
        }


        if($filtros == null)
        {
            $sql = "SELECT  f.*
                FROM    fincas f JOIN ciudads c
                            ON  f.ciudad_id = c.id AND
                                c.descripcion =?  AND
                                f.max_personas >= ? + ?
                        JOIN reservas r
                            ON  r.finca_id = f.id AND
                                r.estado = 'VERIFICACION'
                        JOIN vias v
                            ON	f.via_id = v.id
                UNION
                SELECT  f.*
                FROM    fincas f JOIN ciudads c
                            ON  f.ciudad_id = c.id AND
                                c.descripcion =? AND
                                f.max_personas >= ? + ?
                        JOIN reservas r
                            ON  r.finca_id = f.id AND
                                r.estado = 'CONFIRMADO' AND
                                r.fec_Salida < ?
                        JOIN vias v
                            ON	f.via_id = v.id
                UNION
                SELECT  f.*
                FROM    fincas f JOIN ciudads c
                            ON  f.ciudad_id = c.id AND
                                c.descripcion =? AND
                                f.id NOT IN (SELECT finca_id FROM reservas) AND
                                f.max_personas >= ? + ?
                        JOIN vias v
                            ON	f.via_id = v.id";

            $collection = collect(DB::select($sql,array($data['departamento'], $data['cantAdultos'], $data['cantNinos'],$data['departamento'], $data['cantAdultos'], 
                                            $data['cantNinos'], $data['fecSalida'], $data['departamento'], $data['cantAdultos'], $data['cantNinos'])));
        }else
        {
            $sql = "SELECT  f.*
                    FROM    fincas f JOIN ciudads c
                                ON  f.ciudad_id = c.id AND
                                    c.descripcion =?  AND
                                    f.max_personas >= ? + ? AND
                                    f.cant_banios >= ? AND
                                    f.cant_habitaciones >= ? AND
                                    f.sn_jacuzi >= ? AND
                                    f.sn_piscina >= ?
                            JOIN reservas r
                                ON  r.finca_id = f.id AND
                                    r.estado = 'VERIFICACION'
                            JOIN vias v
                                ON	f.via_id = v.id AND
                                    v.id = ?
                    UNION
                    SELECT  f.*
                    FROM    fincas f JOIN ciudads c
                                ON  f.ciudad_id = c.id AND
                                    c.descripcion =? AND
                                    f.max_personas >= ? + ? AND
                                    f.cant_banios >= ? AND
                                    f.cant_habitaciones >= ? AND
                                    f.sn_jacuzi >= ? AND
                                    f.sn_piscina >= ?
                            JOIN reservas r
                                ON  r.finca_id = f.id AND
                                    r.estado = 'CONFIRMADO' AND
                                    r.fec_Salida < ?
                            JOIN vias v
                                ON	f.via_id = v.id AND
                                    v.id = ?
                    UNION
                    SELECT  f.*
                    FROM    fincas f JOIN ciudads c
                                ON  f.ciudad_id = c.id AND
                                    c.descripcion =? AND
                                    f.id NOT IN (SELECT finca_id FROM reservas) AND
                                    f.max_personas >= ? + ? AND
                                    f.cant_banios >= ? AND
                                    f.cant_habitaciones >= ? AND
                                    f.sn_jacuzi >= ? AND
                                    f.sn_piscina >= ?
                            JOIN vias v
                                ON	f.via_id = v.id AND 
                                    v.id = ?    ";

            $collection = collect(DB::select($sql,array($data['departamento'], 
                                            $data['cantAdultos'], $data['cantNinos'],
                                            $filtros['banios'], $filtros['habitaciones'],
                                            $filtros['snJacuzi'], $filtros['snPiscina'], $filtros['via'],                                            
                                            $data['departamento'], $data['cantAdultos'], 
                                            $data['cantNinos'], 
                                            $filtros['banios'], $filtros['habitaciones'],
                                            $filtros['snJacuzi'], $filtros['snPiscina'], 
                                            $data['fecSalida'], $filtros['via'],                                            
                                            $data['departamento'], $data['cantAdultos'], $data['cantNinos'],
                                            $filtros['banios'], $filtros['habitaciones'],
                                            $filtros['snJacuzi'], $filtros['snPiscina'], $filtros['via'])));
        }

        return $collection;      

    }

}

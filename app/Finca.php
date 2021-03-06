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
        'precio_Talta', 'precio_Tmedia','direccion', 'cant_habitaciones', 'cant_banios', 'max_personas', 
        'departamento_id', 'via_id', 'sn_jacuzi', 'sn_piscina', 'sn_picnic', 'sn_caballos', 'sn_parqueadero', 'slug'
    ];

    /* Relacion  */
    public function departamento()
    {
        // una finca pertenece a una Departamento
        return $this->belongsTo(Departamento::class);
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
                $via_id = $filtros['via'];

                $resultado = $query->where([
                                            ['sn_jacuzi', filter_var($filtros['snJacuzi'], FILTER_VALIDATE_BOOLEAN)],
                                            ['sn_piscina', filter_var($filtros['snPiscina'], FILTER_VALIDATE_BOOLEAN)],
                                            ['cant_banios', '>=', (int)$filtros['banios']],
                                            ['cant_habitaciones', '>=', (int)$filtros['habitaciones']]
                                          ])
                                           ->whereHas('via', function($query) use ($via_id){
                                                if ($via_id != "undefined")
                                                    $query->where('id',(int)$via_id);
                                             });
            }

         
            return $resultado;
        }


        if($filtros == null)
        {
            $sql = "SELECT  f.*
                FROM    fincas f JOIN departamentos c
                            ON  f.departamento_id = c.id AND
                                c.id =?  AND
                                f.max_personas >= ?
                        JOIN reservas r
                            ON  r.finca_id = f.id AND
                                r.estado = 'VERIFICACION'
                        JOIN vias v
                            ON	f.via_id = v.id
                UNION
                SELECT  f.*
                FROM    fincas f JOIN departamentos c
                            ON  f.departamento_id = c.id AND
                                c.id =? AND
                                f.max_personas >= ?
                        JOIN reservas r
                            ON  r.finca_id = f.id AND
                                r.estado = 'CONFIRMADO' AND
                                r.fec_Salida < ?
                        JOIN vias v
                            ON	f.via_id = v.id
                UNION
                SELECT  f.*
                FROM    fincas f JOIN departamentos c
                            ON  f.departamento_id = c.id AND
                                c.id =? AND
                                f.id NOT IN (SELECT finca_id FROM reservas) AND
                                f.max_personas >= ?
                        JOIN vias v
                            ON	f.via_id = v.id";

            $collection = collect(DB::select($sql,array($data['departamento_id'], $data['cantHuespedes'], $data['departamento_id'], $data['cantHuespedes'], 
                                             $data['fecSalida'], $data['departamento_id'], $data['cantHuespedes'])));
        }else
        {
            if ($filtros['via'] == "undefined") $filtros['via'] = null;

            $sql = "SELECT  f.*
                    FROM    fincas f JOIN departamentos c
                                ON  f.departamento_id = c.id AND
                                    c.id =?  AND
                                    f.max_personas >= ? AND
                                    f.cant_banios >= IFNULL(?, f.cant_banios) AND
                                    f.cant_habitaciones >= IFNULL(?, f.cant_habitaciones) AND
                                    f.sn_jacuzi = IFNULL(?, f.sn_jacuzi) AND
                                    f.sn_piscina = IFNULL(?, f.sn_piscina)
                            JOIN reservas r
                                ON  r.finca_id = f.id AND
                                    r.estado = 'VERIFICACION'
                            JOIN vias v
                                ON	f.via_id = v.id AND
                                    v.id = IFNULL(?, v.id)
                    UNION
                    SELECT  f.*
                    FROM    fincas f JOIN departamentos c
                                ON  f.departamento_id = c.id AND
                                    c.id =? AND
                                    f.max_personas >= ? AND
                                    f.cant_banios >= IFNULL(?, f.cant_banios) AND
                                    f.cant_habitaciones >= IFNULL(?, f.cant_habitaciones) AND
                                    f.sn_jacuzi = IFNULL(?, f.sn_jacuzi) AND
                                    f.sn_piscina = IFNULL(?, f.sn_piscina)
                            JOIN reservas r
                                ON  r.finca_id = f.id AND
                                    r.estado = 'CONFIRMADO' AND
                                    r.fec_Salida < IFNULL(?, r.fec_Salida)
                            JOIN vias v
                                ON	f.via_id = v.id AND
                                    v.id = IFNULL(?, v.id)
                    UNION
                    SELECT  f.*
                    FROM    fincas f JOIN departamentos c
                                ON  f.departamento_id = c.id AND
                                    c.id =? AND
                                    f.id NOT IN (SELECT finca_id FROM reservas) AND
                                    f.max_personas >= ? AND
                                    f.cant_banios >= IFNULL(?, f.cant_banios) AND
                                    f.cant_habitaciones >= IFNULL(?, f.cant_habitaciones) AND
                                    f.sn_jacuzi = IFNULL(?, f.sn_jacuzi) AND
                                    f.sn_piscina = IFNULL(?, f.sn_piscina)
                            JOIN vias v
                                ON	f.via_id = v.id AND 
                                    v.id = IFNULL(?, v.id)    ";

            $collection = collect(DB::select($sql,array($data['departamento_id'], 
                                            $data['cantHuespedes'],
                                            $filtros['banios'], $filtros['habitaciones'],
                                            filter_var($filtros['snJacuzi'], FILTER_VALIDATE_BOOLEAN), filter_var($filtros['snPiscina'], FILTER_VALIDATE_BOOLEAN), $filtros['via'],
                                            $data['departamento_id'], $data['cantHuespedes'],                                            
                                            $filtros['banios'], $filtros['habitaciones'],
                                            filter_var($filtros['snJacuzi'], FILTER_VALIDATE_BOOLEAN), filter_var($filtros['snPiscina'], FILTER_VALIDATE_BOOLEAN),
                                            $data['fecSalida'], $filtros['via'],                                            
                                            $data['departamento_id'], $data['cantHuespedes'],
                                            $filtros['banios'], $filtros['habitaciones'],
                                            filter_var($filtros['snJacuzi'], FILTER_VALIDATE_BOOLEAN), filter_var($filtros['snPiscina'], FILTER_VALIDATE_BOOLEAN), $filtros['via'])));
        }
        return $collection;      

    }

}

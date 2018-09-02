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
        //return $this->belongsTo(Via::class);
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

    public function scopeFiltros($query, $data)
    {
        if($data == null)
        {
            $resultado = $query;
         
            return $resultado;
        }
             


        // $fincasR = $query->select('fincas.*', array($data['departamento'], $data['cantAdultos'], $data['cantNinos'],$data['departamento'], $data['cantAdultos'], 
        //                                 $data['cantNinos'], $data['fecSalida'], $data['departamento'], $data['cantAdultos'], $data['cantNinos']));
        // $fincasR = $query->Join('ciudads', [
        //                                 ['ciudads.id', '=', 'fincas.ciudad_id'], 
        //                                 ['ciudads.descripcion', '=', $data['departamento']],
        //                                 ['fincas.max_personas', '>=', $data['cantAdultos'] + $data['cantNinos']]
        //                                 ])
        //                 ->Join('reservas', [
        //                                     ['reservas.finca_id', '=', 'fincas.id'], 
        //                                     ['reservas.estado', '=', 'CONFIRMADO'],
        //                                     ['reservas.fec_Salida', '<', $data['fecSalida']]
        //                                 ])
        //                 ->Join('vias', [
        //                                     ['vias.id', '=', 'fincas.via_id']                                    
        //                                 ])                                       
        //                 ->get();


        $query1 = $query->Join('ciudads', 'ciudads.id', '=', 'fincas.ciudad_id')
                            ->Join('reservas','reservas.finca_id', '=', 'fincas.id')
                            ->Join('vias', 'vias.id', '=', 'fincas.via_id')
                            ->where([
                                    ['ciudads.descripcion', '=', $data['departamento']],
                                    ['fincas.max_personas', '>=', $data['cantAdultos'] + $data['cantNinos']],
                                    ['reservas.estado', '=', 'CONFIRMADO'],
                                    ['reservas.fec_Salida', '<', $data['fecSalida']]
                                 ])
                            ->select('fincas.*');

             

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

        //$fincasR = DB::select($sql,array($data['departamento'], $data['cantAdultos'], $data['cantNinos'],$data['departamento'], $data['cantAdultos'], 
        //                                $data['cantNinos'], $data['fecSalida'], $data['departamento'], $data['cantAdultos'], $data['cantNinos']));
        
        $collection = collect(DB::select($sql,array($data['departamento'], $data['cantAdultos'], $data['cantNinos'],$data['departamento'], $data['cantAdultos'], 
                                        $data['cantNinos'], $data['fecSalida'], $data['departamento'], $data['cantAdultos'], $data['cantNinos'])));
        //$query1 = $query->select('fincas.*')->union($fincasR);

        return $collection;

        // $dep = $data['departamento'];
        // $fecSalida = $data['fecSalida'];
        
        // $query1 = $query->whereHas('ciudad', function($query) use ($dep)
        //                     {
        //                         $query->where('descripcion', $dep);
        //                     })
        //                     ->whereHas('reservas', function($query)
        //                     {
        //                         $query->where('estado', 'VERIFICACION');
        //                     })->get();
        
        // $query2 = $query->whereHas('ciudad', function($query) use ($dep)
        //                     {
        //                         $query->where('descripcion', $dep);
        //                     })
        //                     ->whereHas('reservas', function($query) use ($fecSalida)
        //                     {
        //                         $query->where([['estado', 'CONFIRMADO'], ['fec_Salida', '<', $fecSalida]]);
        //                     })
        //                     ->where('max_personas', '>=',  $data['cantAdultos'] + $data['cantNinos'])->get();

        // $query3 = $query->whereHas('ciudad', function($query) use ($dep)
        //                     {
        //                         $query->where('descripcion', $dep);
        //                     })
        //                     ->whereNotIn('id', function($query) 
        //                     {
        //                         $query->select('finca_id')->from('reservas');                              
        //                     })
        //                     ->where('max_personas', '>=',  $data['cantAdultos'] + $data['cantNinos'])->get();
        

        
        // $prueba = $query->whereHas('ciudad', function($query) use ($dep)
        //                     {
        //                         $query->where('descripcion', $dep);
        //                     })->get();

        // dd($prueba);
        

        //dd($query1->get());
        //dd($query2->get());
        //dd($query3);
        //$result1 = $query1->union($query2);
        //$result2 = $result1->union($query3);
        
        //dd($fincasR->reservas());

        //return $query1;
        
    }

}

<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Finca;
use App\Temporada;
use App\Via;
use App\Reserva;
use App\Ciudad;
use App\Quotation;
use DB;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;


class PageController extends Controller
{

    

    public function index()
    {
        $fechas = Temporada::all();
        
        return view("web.index", compact('fechas'));
    }

    public function about()
    {
        return view("web.about");
    }

    public function contact()
    {
        return view("web.contact");
    }


    public function company()
    {
        return view("web.company");
    }

    // public function farms()
    // {
    //     $fechas = Temporada::all();
    //     $fincas = Finca::orderBy('id', 'DESC')->paginate(6);
    //     $cantReg = Finca::count();
    //     $vias = Via::all();        

    //     return view('web.farms', compact(['fincas', 'cantReg', 'vias', 'fechas']));
    // }



    public function AplicarFiltros(Request $request){
        
        //dd(request()->all());
        
        $data = session()->get('data');
        //dd($data);
        if($data == null)
        {
            $fincas = Finca::Filtros($data)->paginate(100);
            $cantReg = Finca::Filtros($data)->count();

        }else{
            
            $fincasR = Finca::Filtros($data);
            

            $fincasTmp = collect(new Finca);
            $viasC = collect(new Via);
            
            foreach($fincasR as $fin)
            {
                $finca = new Finca();
                $finca->id = $fin->id;
                $finca->nombre = $fin->nombre;
                $finca->descripcion = $fin->descripcion;
                $finca->precio_Tbaja = $fin->precio_Tbaja;
                $finca->precio_Talta = $fin->precio_Talta;
                $finca->direccion = $fin->direccion;
                $finca->cant_habitaciones = $fin->cant_habitaciones;
                $finca->cant_banios = $fin->cant_banios;
                $finca->ciudad_id = $fin->ciudad_id;
                $finca->via_id = $fin->via_id;
                $finca->sn_jacuzi = $fin->sn_jacuzi;
                $finca->sn_piscina = $fin->sn_piscina;
                $finca->slug = $fin->slug;
                $finca->max_personas = $fin->max_personas;

                $fincasTmp->prepend($finca);
                
                $viasC->prepend(Via::where('id', $fin->via_id)->first());

            }

            // Get current page form url e.x. &page=1
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            
            // Create a new Laravel collection from the array data
            //$itemCollection = collect($arrayPrueba);
    
            // Define how many items we want to be visible in each page
            $perPage = 100;
    
            // Slice the collection to get the items to display in current page
            $currentPageItems = $fincasTmp->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
    
            // Create our paginator and pass it to the view
            $fincas= new LengthAwarePaginator($currentPageItems , count($fincasTmp), $perPage);
    
            // set url path for generted links
            $fincas->setPath($request->url());

            $cantReg = count($fincasTmp);   
            
            //dd($fincas);

        }

        return view('web.list.listFarms ', compact(['fincas', 'cantReg']));
    }

    public function farms(Request $request)
    {
        $data = request()->all();
        $fechas = Temporada::all();
        

        if($data == null || ($data != null  && !isset($data['post']) && !isset($data['departamento'])))
        {
            $request->session()->forget('data');
            $fechas = Temporada::all();
            $fincas = Finca::orderBy('id', 'DESC')->paginate(6);
            $cantReg = Finca::count();
            $vias = Via::all();        
            
            return view('web.farms', compact(['fincas', 'cantReg', 'vias', 'fechas']));
        }
        
        if(!isset($data['departamento']))
            $data = session()->get('data');

        /* Sirve pero sin Verse en el View */
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

        $fincasR = DB::select($sql,array($data['departamento'], $data['cantAdultos'], $data['cantNinos'],$data['departamento'], $data['cantAdultos'], 
                                        $data['cantNinos'], $data['fecSalida'], $data['departamento'], $data['cantAdultos'], $data['cantNinos']));
        
        $fincasTmp = collect(new Finca);
        $viasC = collect(new Via);
        
        foreach($fincasR as $fin)
        {
            $finca = new Finca();
            $finca->id = $fin->id;
            $finca->nombre = $fin->nombre;
            $finca->descripcion = $fin->descripcion;
            $finca->precio_Tbaja = $fin->precio_Tbaja;
            $finca->precio_Talta = $fin->precio_Talta;
            $finca->direccion = $fin->direccion;
            $finca->cant_habitaciones = $fin->cant_habitaciones;
            $finca->cant_banios = $fin->cant_banios;
            $finca->ciudad_id = $fin->ciudad_id;
            $finca->via_id = $fin->via_id;
            $finca->sn_jacuzi = $fin->sn_jacuzi;
            $finca->sn_piscina = $fin->sn_piscina;
            $finca->slug = $fin->slug;
            $finca->max_personas = $fin->max_personas;

            $fincasTmp->prepend($finca);
            
            $viasC->prepend(Via::where('id', $fin->via_id)->first());

        }
        
        // Se quitan duplicados
        $vias = $viasC->unique();
        $cantReg = $fincasTmp->count();
                       
        $request->session()->put('data', $data);

        // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        
        // Create a new Laravel collection from the array data
        //$itemCollection = collect($arrayPrueba);
 
        // Define how many items we want to be visible in each page
        $perPage = 6;
 
        // Slice the collection to get the items to display in current page
        $currentPageItems = $fincasTmp->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
 
        // Create our paginator and pass it to the view
        $fincas= new LengthAwarePaginator($currentPageItems , count($fincasTmp), $perPage);
 
        // set url path for generted links
        $fincas->setPath($request->url());

        return view('web.farms', compact(['fincas', 'cantReg', 'vias', 'data', 'fechas']));

    }

    public function farm($slug)
    {
        $data = session()->get('data');
        $fechas = Temporada::all();
        $finca = Finca::where('slug', $slug)->first();        
        return view('web.farm', compact(['finca', 'fechas', 'data']));
    }
    
}

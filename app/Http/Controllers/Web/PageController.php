<?php

namespace App\Http\Controllers\Web;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;
use App\Mail\SendEmail;
use App\Mail\ConfirmacionPreReserva;
use App\Mail\MensajeAlquilerFincas;
use App\Finca;
use App\Temporada;
use App\Via;
use App\Reserva;
use App\Departamento;
use App\Quotation;
use App\fotoFinca;
use App\Cliente;
use Carbon\Carbon;
use DateTime;

class PageController extends Controller
{  

    public function index()
    {
        $fechas = Temporada::where('estado', 'ALTA')->get();
        $fecMedia = Temporada::where('estado', 'MEDIA')->get();
        $fecha = Carbon::now();
        
        $reservasConfirmadas = Reserva::where([['fec_ingreso', '>=' , $fecha ], ['estado', 'CONFIRMADO']])->get();
        $reservasVerificacion = Reserva::where([['fec_ingreso', '>=' , $fecha ], ['estado', 'VERIFICACION']])->get();
        $deps = Departamento::select('id', 'descripcion')->get();
        foreach ($deps as $dep) {
            $departamentos[$dep->id] = $dep->descripcion;    
        }


        return view("web.index", compact('fechas', 'fecMedia', 'reservasConfirmadas', 'reservasVerificacion', 'departamentos'));
    }

    public function about()
    {
        return view("web.about");
    }

    public function contact()
    {
        return view("web.contact");
    }


    public function events()
    {
        $fotos = fotoFinca::paginate(10);
        
        return view("web.events", compact(['fotos']));
    }

    public function AplicarFiltros(Request $request)
    {
        
        $filtros = request()->all();
        $data = session()->get('data');
        
        if($data == null)
        {
            $fincas = Finca::Filtros($data, $filtros)->paginate(6);
            $cantReg = Finca::Filtros($data, $filtros)->count();

        }else{
            
            $fincasR = Finca::Filtros($data, $filtros);            

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
                $finca->departamento_id = $fin->departamento_id;
                $finca->via_id = $fin->via_id;
                $finca->sn_jacuzi = $fin->sn_jacuzi;
                $finca->sn_piscina = $fin->sn_piscina;
                $finca->slug = $fin->slug;
                $finca->max_personas = $fin->max_personas;

                $fincasTmp->prepend($finca);
                
                $viasC->prepend(Via::where('id', $fin->via_id)->first());

            }

            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $perPage = 6;
            $currentPageItems = $fincasTmp->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
            $fincas= new LengthAwarePaginator($currentPageItems , count($fincasTmp), $perPage);
    
            $cantReg = count($fincasTmp);   
        }

        $fincas->setPath(url()->current());

        return view('web.list.listFarms ', compact(['fincas', 'cantReg']));
    }

    public function farms(Request $request)
    {
        
        $data = request()->all();
        
        
        if($data == null || ($data != null  && !isset($data['p']) && !isset($data['departamento_id'])))
        {
            $request->session()->forget('data');            
            
            $fincas = Finca::orderBy('id', 'DESC')->paginate(10);
            $cantReg = Finca::count();
            $vias = Via::all();        
            
            $fechas = Temporada::where('estado', 'ALTA')->get();
            $fecMedia = Temporada::where('estado', 'MEDIA')->get();
            $fecha = Carbon::now();
            
            $reservasConfirmadas = Reserva::where([['fec_ingreso', '>=' , $fecha ], ['estado', 'CONFIRMADO']])->get();
            $reservasVerificacion = Reserva::where([['fec_ingreso', '>=' , $fecha ], ['estado', 'VERIFICACION']])->get();

            $deps = Departamento::select('id', 'descripcion')->get();
            foreach ($deps as $dep) {
                $departamentos[$dep->id] = $dep->descripcion;    
            }

            if($request->ajax())
                return view('web.list.listFarms ', compact(['fincas', 'cantReg', 'fecMedia', 'reservasConfirmadas', 'reservasVerificacion', 'departamentos']));
            else
                return view('web.farms', compact(['fincas', 'cantReg', 'vias', 'fechas', 'fecMedia', 'reservasConfirmadas', 'reservasVerificacion', 'departamentos']));
        }
        
        

        if(!isset($data['departamento_id']))
            $data = session()->get('data');

        

        /* Sirve pero sin Verse en el View */
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

        $fincasR = DB::select($sql,array($data['departamento_id'], $data['cantHuespedes'], $data['departamento_id'], $data['cantHuespedes'], 
                                         $data['fecSalida'], $data['departamento_id'], $data['cantHuespedes']));
        
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
            $finca->departamento_id = $fin->departamento_id;
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
        
        // Define how many items we want to be visible in each page
        $perPage = 10;
 
        // Slice the collection to get the items to display in current page
        $currentPageItems = $fincasTmp->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
 
        // Create our paginator and pass it to the view
        $fincas= new LengthAwarePaginator($currentPageItems , count($fincasTmp), $perPage);
 
        // set url path for generted links
        $fincas->setPath($request->url());
        
        $fechas = Temporada::where('estado', 'ALTA')->get();
        $fecMedia = Temporada::where('estado', 'MEDIA')->get();
        $fecha = Carbon::now();
        
        $reservasConfirmadas = Reserva::where([['fec_ingreso', '>=' , $fecha ], ['estado', 'CONFIRMADO']])->get();
        $reservasVerificacion = Reserva::where([['fec_ingreso', '>=' , $fecha ], ['estado', 'VERIFICACION']])->get();

        $deps = Departamento::select('id', 'descripcion')->get();
        foreach ($deps as $dep) {
            $departamentos[$dep->id] = $dep->descripcion;    
        }

        if($request->ajax())
                return view('web.list.listFarms ', compact(['fincas', 'cantReg', 'data', 'reservasConfirmadas', 'reservasVerificacion', 'fecMedia', 'departamentos']));
            else
                return view('web.farms', compact(['fincas', 'cantReg', 'vias', 'fechas', 'data', 'reservasConfirmadas', 'reservasVerificacion', 'fecMedia', 'departamentos']));

    }

    public function farm($slug)
    {
        $data = session()->get('data');
        $fechas = Temporada::where('estado', 'ALTA')->get();
        $fecMedia = Temporada::where('estado', 'MEDIA')->get();
        $finca = Finca::where('slug', $slug)->first();    
        $fecha = Carbon::now();
        $path = base_path().'/uploads/images/';

        $dateReservasConfirmadas = Reserva::where([['finca_id', $finca->id], ['fec_ingreso', '>=' , $fecha ], ['estado', 'CONFIRMADO']])->get();
        $reservasVerificacion = Reserva::where([['finca_id', $finca->id], ['fec_ingreso', '>=' , $fecha ], ['estado', 'VERIFICACION']])->get();

        $reservasConfirmadas = [];

        foreach($dateReservasConfirmadas as $element) 
        {
           $in = Carbon::parse($element->fec_Ingreso);
            $out = Carbon::parse($element->fec_Salida);

            
            for($date = $in; $date->lte($out); $date->addDay()) 
            { 
                $reservasConfirmadas[] = $date->format('d/m/Y'); 
            } 
        }

        $deps = Departamento::select('id', 'descripcion')->get();
        foreach ($deps as $dep) {
            $departamentos[$dep->id] = $dep->descripcion;    
        }

        return view('web.farm', compact(['finca', 'fechas', 'data', 'reservasConfirmadas', 'reservasVerificacion', 'fecMedia', 'path', 'departamentos']));
    }

    public function sendMessageContact(Request $request)
    {
        $data = $request->all();
        
        /* Datos Para enviar al Administrador */
        $obj = new \stdClass();    
        $obj->fname = $data['fname'];
        $obj->email = $data['email'];
        $obj->phone = $data['phone'];
        $obj->subject = $data['subject'];
        $obj->message = $data['message'];
        
        Mail::to('gusadolfo123@gmail.com')->send(new MensajeAlquilerFincas($obj));

        return response()->json(['responseText' => 'Success!'], 200);
    }

    public function sendMessage(Request $request)
    {
        $data = $request->all();
        $fecha = Carbon::now();

        $cliente = [
            'nombre' => $data['nomCompleto'],
            'email' => $data['correo'],
            'telefono1' => $data['telefono1'],
            'telefono2' => $data['telefono2']
        ];

        $clienteC = Cliente::firstOrCreate($cliente);
        
        $reserva = [
            'finca_id' => $data['fincaId'],
            'cliente_id' => $clienteC->id,
            'fec_Reserva' => $fecha,
            'fec_Ingreso' => Carbon::createFromFormat('d/m/Y', $data['fecDesde']),
            'fec_Salida' => Carbon::createFromFormat('d/m/Y', $data['fecHasta']),
            'preCotizacion' => $data['tCotizacion'],
            'requerimientos' => $data['comentarios'],
            'cant_huespedes' => $data['cantHuespedes'],
            'estado' => 'VERIFICACION'
        ];
        
        $reservaC = Reserva::firstOrCreate($reserva);

        $objDemo = new \stdClass();        
        $objDemo->nomFinca = $data['nomFinca'];
        $objDemo->valNocheTempAlta = $data['valNocheTempAlta'];
        $objDemo->valNocheTempMedia = $data['valNocheTempMedia'];
        $objDemo->valNocheTempNormal = $data['valNocheTempNormal'];
        $objDemo->nroNochesN = $data['nroNochesN'];
        $objDemo->nroNochesM = $data['nroNochesM'];
        $objDemo->nroNochesA = $data['nroNochesA'];
        $objDemo->totalNochesTempNormal = $data['totalNochesTempNormal'];
        $objDemo->totalNochesTempMedia = $data['totalNochesTempMedia'];
        $objDemo->totalNochesTempAlta = $data['totalNochesTempAlta'];
        $objDemo->totalCotizacion = $data['totalCotizacion'];
        $objDemo->nomCompleto = $data['nomCompleto'];
        $objDemo->correo = $data['correo'];
        $objDemo->telefono1 = $data['telefono1'];
        $objDemo->telefono2 = $data['telefono2'];
        $objDemo->comentarios = $data['comentarios'];
        $objDemo->fecDesde = $data['fecDesde'];
        $objDemo->fecHasta = $data['fecHasta'];
        $objDemo->nroReserva = $reservaC->id;
        $objDemo->sender = 'AlquilamosFincas.com';
                
        Mail::to($data['correo'])->send(new ConfirmacionPreReserva($objDemo));
        

        /* Datos Para enviar al Administrador */
        $obj = new \stdClass();    
        $obj->nomFinca = $data['nomFinca'];
        $obj->valNocheTempAlta = $data['valNocheTempAlta'];
        $obj->valNocheTempMedia = $data['valNocheTempMedia'];
        $obj->valNocheTempNormal = $data['valNocheTempNormal'];
        $obj->nroNochesN = $data['nroNochesN'];
        $obj->nroNochesM = $data['nroNochesM'];
        $obj->nroNochesA = $data['nroNochesA'];
        $obj->totalNochesTempNormal = $data['totalNochesTempNormal'];
        $obj->totalNochesTempMedia = $data['totalNochesTempMedia'];
        $obj->totalNochesTempAlta = $data['totalNochesTempAlta'];
        $obj->totalCotizacion = $data['totalCotizacion'];
        $obj->nomCompleto = $data['nomCompleto'];
        $obj->correo = $data['correo'];
        $obj->telefono1 = $data['telefono1'];
        $obj->telefono2 = $data['telefono2'];
        $obj->comentarios = $data['comentarios'];
        $obj->fecDesde = $data['fecDesde'];
        $obj->fecHasta = $data['fecHasta'];
        $obj->nroReserva = $reservaC->id;

        Mail::to('gusadolfo123@gmail.com')->send(new SendEmail($obj));

        return response()->json(['responseText' => 'Success!'], 200);
    }
    
}

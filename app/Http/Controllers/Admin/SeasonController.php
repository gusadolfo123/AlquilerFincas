<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Temporada;
use DateTime;


class SeasonController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fechas = Temporada::where('estado', 'ALTA')->get();
        $fecMedia = Temporada::where('estado', 'MEDIA')->get();
        $fecha = Carbon::now();
        
        return view("admin.season.index", compact('fechas', 'fecMedia'));
    }

    public function indexAlta(Request $request)
    {
        if($request->ajax())
        {
            $data = request()->all();

            Temporada::where('estado', 'ALTA')->whereNotNull('id')->delete();

            foreach ($data['fecha'] as $fecha) {
                $fec = [
                    'descripcion' => 'temporada alta',
                    'fecha' => Carbon::createFromFormat('d/m/Y', $fecha),
                    'estado' => 'ALTA'
                ];

                Temporada::create($fec);
            }
            
            return response()->json(['response' => 'success'], 200);
        }

        if($request->method() == 'GET')
        {
            $fechas = Temporada::where('estado', 'ALTA')->get();
            return view("admin.season.indexAlta", compact('fechas'));
        }                   
        
    }

    public function indexMedia(Request $request)
    {
        if($request->ajax())
        {
            $data = request()->all();

            Temporada::where('estado', 'MEDIA')->whereNotNull('id')->delete();

            foreach ($data['fecha'] as $fecha) {
                $fec = [
                    'descripcion' => 'temporada Media',
                    'fecha' => Carbon::createFromFormat('d/m/Y', $fecha),
                    'estado' => 'MEDIA'
                ];

                Temporada::create($fec);
            }
            
            return response()->json(['response' => 'success'], 200);
        }

        if($request->method() == 'GET')
        {
            $fechas = Temporada::where('estado', 'MEDIA')->get();
            return view("admin.season.indexMedia", compact('fechas'));
        }
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

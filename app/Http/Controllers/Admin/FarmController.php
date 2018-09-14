<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FarmStoreRequest;
use App\Http\Requests\FarmUpdateRequest;
use App\Finca;
use App\Via;
use App\Departamento;


class FarmController extends Controller
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
        //
        $cantReg = Finca::all()->count(); 
        $fincas = Finca::orderBy('id')->paginate(10);

        return view('admin.farm.index', compact('fincas', 'cantReg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vis = Via::select('id', 'descripcion')->get();
        foreach ($vis as $vi) {
            $vias[$vi->id] = $vi->descripcion;    
        }

        $deps = Departamento::select('id', 'descripcion')->get();
        foreach ($deps as $dep) {
            $departamentos[$dep->id] = $dep->descripcion;    
        }

        return view('admin.farm.create', compact('vias', 'departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FarmStoreRequest $request)
    {
        
        if($request->get('sn_jacuzi') == "on")
            $request['sn_jacuzi'] = 1;
        else 
            $request['sn_jacuzi'] = 0;
        
        if($request->get('sn_piscina') == "on")
            $request['sn_piscina'] = 1;
        else 
            $request['sn_piscina'] = 0;

        if($request->get('sn_picnic') == "on")
            $request['sn_picnic'] = 1;
        else 
            $request['sn_picnic'] = 0;
        
        if($request->get('sn_caballos') == "on")
            $request['sn_caballos'] = 1;
        else 
            $request['sn_caballos'] = 0;
        
        if($request->get('sn_parqueadero') == "on")
            $request['sn_parqueadero'] = 1;
        else 
            $request['sn_parqueadero'] = 0;

        //dd($request->all());
        $finca = Finca::create($request->all());

        $vias = Via::all();
        $departamentos = Departamento::all();

        return redirect()->route('farms.edit', $finca->id)->with('info', 'Finca Creada Correctamente');        
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
        $finca = Finca::find($id);

        return view('admin.farm.show', compact('finca'));
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
        $finca = Finca::find($id);
        $vias = Via::where('id', $finca->via_id)->first()->pluck('descripcion', 'id');
        $departamentos = Departamento::where('id', $finca->departamento_id)->first()->pluck('descripcion', 'id');

        return view('admin.farm.edit', compact('finca', 'vias', 'departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FarmUpdateRequest $request, $id)
    {
        if($request->get('sn_jacuzi') == "on")
            $request['sn_jacuzi'] = 1;
        else 
            $request['sn_jacuzi'] = 0;
        
        if($request->get('sn_piscina') == "on")
            $request['sn_piscina'] = 1;
        else 
            $request['sn_piscina'] = 0;

        if($request->get('sn_picnic') == "on")
            $request['sn_picnic'] = 1;
        else 
            $request['sn_picnic'] = 0;
        
        if($request->get('sn_caballos') == "on")
            $request['sn_caballos'] = 1;
        else 
            $request['sn_caballos'] = 0;
        
        if($request->get('sn_parqueadero') == "on")
            $request['sn_parqueadero'] = 1;
        else 
            $request['sn_parqueadero'] = 0;

        $finca = Finca::find($id);
        $finca->fill($request->all())->save();

        return redirect()->route('farms.edit', $finca->id)->with('info', 'Finca Modificada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $finca = Finca::find($id)->delete();
        
        return back()->with('info', 'Registro Eliminado Correctamente');

    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Via;
use App\Finca;

class TrackController extends Controller
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
        $cantReg = Via::all()->count(); 
        $vias = Via::orderBy('id')->paginate(10);
                
        return view('admin.track.index', compact('vias', 'cantReg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.track.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $via = Via::create($request->all());         
        return redirect()->route('tracks.index')->with('info', 'Via Creada Correctamente');    
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
        $via = Via::find($id);
        return view('admin.track.edit', compact('via'));
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
        $via = Via::find($id);
        $via->fill($request->all())->save();
        
        return redirect()->route('tracks.index')->with('info', 'Departamento Modificado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fincas = Finca::where('via_id', $id)->count();
        if($fincas > 0)
            return back()->with('danger', 'Existen fincas relacionadas a este departamento, no puede ser eliminado hasta que las fincas no sean eliminadas previamente');
        else{
            $via = Via::find($id)->delete();      
            return back()->with('info', 'Registro Eliminado Correctamente');
        }
    }
}

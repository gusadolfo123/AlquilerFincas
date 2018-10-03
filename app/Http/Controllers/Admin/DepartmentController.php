<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Departamento;
use App\Finca;

class DepartmentController extends Controller
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
        $cantReg = Departamento::all()->count(); 
        $departamentos = Departamento::orderBy('id')->paginate(10);
                
        return view('admin.department.index', compact('departamentos', 'cantReg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {          
        return view('admin.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departamento = Departamento::create($request->all());         
        return redirect()->route('departments.index')->with('info', 'Departamento Creado Correctamente');     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamento = Departamento::find($id);
        return view('admin.department.edit', compact('departamento'));
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
        $departamento = Departamento::find($id);
        $departamento->fill($request->all())->save();
        
        return redirect()->route('departments.index')->with('info', 'Departamento Modificado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fincas = Finca::where('departamento_id', $id)->count();
        if($fincas > 0)
            return back()->with('danger', 'Existen fincas relacionadas a este departamento, no puede ser eliminado hasta que las fincas no sean eliminadas previamente');
        else{
            $departamento = Departamento::find($id)->delete();        
            return back()->with('info', 'Registro Eliminado Correctamente');
        }
    }
}

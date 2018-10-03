<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cliente;
use App\Reserva;

class CustomerController extends Controller
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
        $cantReg = Cliente::all()->count(); 
        $clientes = Cliente::orderBy('id')->paginate(10);
                
        return view('admin.customer.index', compact('clientes', 'cantReg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = Cliente::create($request->all());         
        return redirect()->route('customers.index')->with('info', 'Cliente Creado Correctamente');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        return view('admin.customer.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);       
        return view('admin.customer.edit', compact('cliente'));
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
        $cliente = Cliente::find($id);
        $cliente->fill($request->all())->save();
        
        return redirect()->route('customers.index')->with('info', 'Cliente Modificado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservas = Reserva::where('cliente_id', $id)->count();
        if($reservas > 0)
            return back()->with('danger', 'Existen Reservas relacionadas a este cliente, no puede ser eliminado hasta que las reservas no sean eliminadas previamente');
        else{
            $cliente = Cliente::find($id)->delete();
            return back()->with('info', 'Registro Eliminado Correctamente');
        }                
    }
}

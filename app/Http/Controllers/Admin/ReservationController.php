<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reserva;
use App\Finca;
use App\Cliente;

class ReservationController extends Controller
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
        $cantReg = Reserva::all()->count(); 
        $reservas = Reserva::orderBy('id')->paginate(10);
        
        return view('admin.reservation.index', compact('reservas', 'cantReg'));
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
        $reserva = Reserva::find($id);
        $fincas = Finca::where('id', $reserva->finca_id)->first()->pluck('nombre', 'id');
        $estados = ['CONFIRMADO' => 'CONFIRMADO', 'VERIFICACION' => 'VERIFICACION'];
        
        $reserva->fec_Reserva =  \Carbon\Carbon::parse($reserva->fec_Reserva)->format('Y-m-d');
        $reserva->fec_Ingreso =  \Carbon\Carbon::parse($reserva->fec_Ingreso)->format('Y-m-d');
        $reserva->fec_Salida =  \Carbon\Carbon::parse($reserva->fec_Salida)->format('Y-m-d');
        return view('admin.reservation.show', compact('reserva', 'fincas', 'estados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reserva = Reserva::find($id);
        $fincas = Finca::where('id', $reserva->finca_id)->first()->pluck('nombre', 'id');
        $estados = ['CONFIRMADO' => 'CONFIRMADO', 'VERIFICACION' => 'VERIFICACION'];
        
        $reserva->fec_Reserva =  \Carbon\Carbon::parse($reserva->fec_Reserva)->format('Y-m-d');
        $reserva->fec_Ingreso =  \Carbon\Carbon::parse($reserva->fec_Ingreso)->format('Y-m-d');
        $reserva->fec_Salida =  \Carbon\Carbon::parse($reserva->fec_Salida)->format('Y-m-d');

        return view('admin.reservation.edit', compact('reserva', 'fincas', 'estados'));
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
        $reseva = Reserva::find($id);
        $reseva->fill($request->all())->save();
        
        return redirect()->route('reservations.edit', $reseva->id)->with('info', 'Reservacion Modificada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserva = Reserva::find($id)->delete();        
        return back()->with('info', 'Registro Eliminado Correctamente');
    }
}

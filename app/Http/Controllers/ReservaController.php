<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserva::Paginate(7);
        return view('reserva.index',['reservas'=>$reservas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $reserva = new Reserva();
        $reserva->idCliente= $id;
        $reserva->idEncargado= auth()->user()->personas->id;
        $reserva->fechaRecoger = '2022-01-20';
        $reserva->estado = 0;
        $reserva->save();
        
        return redirect()->route('detalle_reserva.create',[$reserva->id]);
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
        $reserva = Reserva::findOrFail($id);
        $reserva->fechaRecoger = $request->input('fechaRecoger');
        $reserva->save();
        return redirect()->route('reserva.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        foreach ($reserva->detallesReservas as $detalle)
        {
           $detalle->delete();
        }
        $reserva->delete();
        return redirect()->route('reserva.index');
    }
}

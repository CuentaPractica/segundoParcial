<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Repuesto;
use App\Models\Descuento;
use App\Models\Detalle_Reserva;

class Detalle_reservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $reserva = Reserva::findOrFail($id);
        $repuestos = Repuesto::all();
        $descuentos = Descuento::all();
      
        return view('detalle_reserva.create',['reserva'=>$reserva],['repuestos'=>$repuestos,'descuentos'=>$descuentos]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $idRepuesto = $request->input('repuesto');
        $cantidad = $request->input('cantidad');
        $idDescuento = $request->input('descuento');
       if( Repuesto::where('id', $idRepuesto )->exists()){
        $repuesto = Repuesto::findOrFail($idRepuesto);

        $detalleReserva = new Detalle_reserva();
        if($idDescuento==0){
 
            $detalleReserva->idReserva= $id;
            $detalleReserva->idRepuesto= $idRepuesto;
            $detalleReserva->cantidad = $cantidad;
            $detalleReserva->save();
            
        }else{

            $detalleReserva->idReserva= $id;
            $detalleReserva->idRepuesto= $idRepuesto;
            $detalleReserva->idDescuento= $idDescuento;
            $detalleReserva->cantidad = $cantidad;
            $detalleReserva->save();
        }
        return redirect()->route('detalle_reserva.create',[$id]);
    }else{return redirect()->back()->with('mensaje', 'No existe el código de producto ingresado!');}
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
    public function destroy($id,$reserva_id)
    {
        $detalleReserva = Detalle_reserva::findOrFail($id);
        $detalleReserva->delete();
        return redirect()->route('detalle_reserva.create',[$reserva_id]);
    }
}

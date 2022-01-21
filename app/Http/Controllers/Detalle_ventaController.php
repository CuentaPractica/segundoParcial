<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Repuesto;
use App\Models\Descuento;
use App\Models\Pago;
use App\Models\Detalle_compra;
use App\Models\Reserva;

class Detalle_ventaController extends Controller
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
        $venta = Compra::findOrFail($id);
        $repuestos = Repuesto::all();
        $descuentos = Descuento::all();
        $pagos = Pago::all();
      
        return view('detalle_venta.create',['venta'=>$venta],['repuestos'=>$repuestos,'descuentos'=>$descuentos,'pagos'=>$pagos]);

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
        if($cantidad<=$repuesto->stock){
        $precio = $repuesto->precio;

        $detalleVenta = new Detalle_compra();
        if($idDescuento==0){
 
            $detalleVenta->idCompra= $id;
            $detalleVenta->idRepuesto= $idRepuesto;
            $detalleVenta->precioUnitario= $precio;
            $detalleVenta->cantidad = $cantidad;
            $detalleVenta->precioTotal = $precio * $cantidad;
            $detalleVenta->save();
            
        }else{
            $descuento = Descuento::findOrFail($idDescuento);
            $porcentajeDesc = $descuento->porcentajeDescuento;
            $precioUnitario = $precio - ($precio*$porcentajeDesc);

            $detalleVenta->idCompra= $id;
            $detalleVenta->idRepuesto= $idRepuesto;
            $detalleVenta->idDescuento= $idDescuento;
            $detalleVenta->precioUnitario= $precioUnitario;
            $detalleVenta->cantidad = $cantidad;
            $detalleVenta->precioTotal = $precioUnitario * $cantidad;
            $detalleVenta->save();
        }
        $repuesto = Repuesto::findOrFail($idRepuesto);
        $repuesto->stock = $repuesto->stock - $cantidad;
        $repuesto->save();
        return redirect()->route('detalle_venta.create',[$id]);
     }else{return redirect()->back()->with('mensaje', 'La cantidad de producto ingresado no es suficiente para vender!');}
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

    public function venderReserva($id)
    {
        $reserva = Reserva::findOrFail($id);
        $venta = new Compra();
        $venta->idCliente= $reserva->idCliente;
        $venta->idEncargado= auth()->user()->personas->id;
        $venta->save();

        $reserva->estado = 1;
        $reserva->save();

        foreach ($reserva->detallesReservas as $detalle)
        {
            $idRepuesto = $detalle->idRepuesto;
            $cantidad = $detalle->cantidad;
            $idDescuento = $detalle->idDescuento;
    
            $repuesto = Repuesto::findOrFail($idRepuesto);
            $precio = $repuesto->precio;
    
            $detalleVenta = new Detalle_compra();
            if($idDescuento==0){
     
                $detalleVenta->idCompra= $venta->id;
                $detalleVenta->idRepuesto= $idRepuesto;
                $detalleVenta->precioUnitario= $precio;
                $detalleVenta->cantidad = $cantidad;
                $detalleVenta->precioTotal = $precio * $cantidad;
                $detalleVenta->save();
                
            }else{
                $descuento = Descuento::findOrFail($idDescuento);
                $porcentajeDesc = $descuento->porcentajeDescuento;
                $precioUnitario = $precio - ($precio*$porcentajeDesc);
    
                $detalleVenta->idCompra= $venta->id;
                $detalleVenta->idRepuesto= $idRepuesto;
                $detalleVenta->idDescuento= $idDescuento;
                $detalleVenta->precioUnitario= $precioUnitario;
                $detalleVenta->cantidad = $cantidad;
                $detalleVenta->precioTotal = $precioUnitario * $cantidad;
                $detalleVenta->save();
            }
            $repuesto = Repuesto::findOrFail($idRepuesto);
            $repuesto->stock = $repuesto->stock - $cantidad;
            $repuesto->save();
        }
        return redirect()->route('venta.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$venta_id)
    {
        $detalleVenta = Detalle_compra::findOrFail($id);
        $idRepuesto=$detalleVenta->idRepuesto;
        $repuesto = Repuesto::findOrFail($idRepuesto);
        $repuesto->stock = $repuesto->stock + $detalleVenta->cantidad;
        $repuesto->save();
        $detalleVenta->delete();
        return redirect()->route('detalle_venta.create',[$venta_id]);
    }
}

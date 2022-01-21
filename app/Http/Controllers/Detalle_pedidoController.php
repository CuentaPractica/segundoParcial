<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Repuesto;
use App\Models\Detalle_pedido;

class Detalle_pedidoController extends Controller
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
        $pedido = Pedido::findOrFail($id);
        $repuestos = Repuesto::all();
      
        return view('detalle_pedido.create',['pedido'=>$pedido],['repuestos'=>$repuestos]);

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
        $precioTotal = $request->input('precioTotal');
       if( Repuesto::where('id', $idRepuesto )->exists()){
        $repuesto = Repuesto::findOrFail($idRepuesto);
        $precio = $precioTotal/$cantidad;

        $detallePedido = new Detalle_pedido();
 
            $detallePedido->idPedido= $id;
            $detallePedido->idRepuesto= $idRepuesto;
            $detallePedido->precioUnitario= $precio;
            $detallePedido->cantidad = $cantidad;
            $detallePedido->precioTotal = $precioTotal;
            $detallePedido->save();

        $repuesto = Repuesto::findOrFail($idRepuesto);
        $repuesto->stock = $repuesto->stock + $cantidad;
        $repuesto->save();
        
        return redirect()->route('detalle_pedido.create',[$id]);
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
    public function destroy($id,$pedido_id)
    {
        $detallePedido = Detalle_pedido::findOrFail($id);
        $idRepuesto=$detallePedido->idRepuesto;
        $repuesto = Repuesto::findOrFail($idRepuesto);
        $repuesto->stock = $repuesto->stock - $detallePedido->cantidad;
        $repuesto->save();
        $detallePedido->delete();
        return redirect()->route('detalle_pedido.create',[$pedido_id]);
    }
}

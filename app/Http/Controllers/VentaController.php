<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Detalle_compra;
use App\Models\Repuesto;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Compra::Paginate(7);
        return view('venta.index',['ventas'=>$ventas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $venta = new Compra();
        $venta->idCliente= $id;
        $venta->idEncargado= auth()->user()->personas->id;
        $venta->save();
        
        return redirect()->route('detalle_venta.create',[$venta->id]);
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
        $venta = Compra::findOrFail($id);
        $venta->montoTotal = Detalle_compra::where('idCompra',$id)->sum('precioTotal');
        $venta->idPago = $request->input('pago');
        $venta->save();
        return redirect()->route('venta.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venta = Compra::findOrFail($id);
        foreach ($venta->detallesVentas as $detalle)
        {
            $idRepuesto=$detalle->idRepuesto;
            $repuesto = Repuesto::findOrFail($idRepuesto);
            $repuesto->stock = $repuesto->stock + $detalle->cantidad;
            $repuesto->save();
           $detalle->delete();
        }
        $venta->delete();
        return redirect()->route('venta.index');
    }
}

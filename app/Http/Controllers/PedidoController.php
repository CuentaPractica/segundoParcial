<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Repuesto;
use App\Models\Detalle_pedido;
use Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->addCountVisit();
        $pedidos = Pedido::Paginate(7);
        return view('pedido.index',['pedidos'=>$pedidos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $this->addCountVisit();
        $pedido = new Pedido();
        $pedido->idProveedor= $id;
        $pedido->montoTotal= 0;
        $pedido->save();
        
        return redirect()->route('detalle_pedido.create',[$pedido->id]);
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
        $this->addCountVisit();
        $pedido = Pedido::findOrFail($id);
        $pedido->montoTotal = Detalle_pedido::where('idPedido',$id)->sum('precioTotal');
        $pedido->save();
        return redirect()->route('pedido.index');
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
    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        foreach ($pedido->detallesPedidos as $detalle)
        {
            $idRepuesto=$detalle->idRepuesto;
            $repuesto = Repuesto::findOrFail($idRepuesto);
            $repuesto->stock = $repuesto->stock - $detalle->cantidad;
            $repuesto->save();
           $detalle->delete();
        }
        $pedido->delete();
        return redirect()->route('pedido.index');
    }
    private function addCountVisit(){
        Auth::user()->countPage(3);
    }
}

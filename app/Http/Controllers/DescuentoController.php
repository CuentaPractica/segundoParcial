<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Descuento;
use Auth;

class DescuentoController extends Controller
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
    public function create()
    {
        $this->addCountVisit();
        $descuentos=Descuento::Paginate(4);
        return view('descuento.create',['descuentos'=>$descuentos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $descuento= new Descuento();
        $descuento->descripcion= $request->input('descripcion');
        $descuento->porcentajeDescuento= $request->input('descuento');
        $descuento->save();
        return redirect()->route('descuento.create');
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
        $descuentos=Descuento::Paginate(4);
        $descuento=Descuento::findOrFail($id);
        return view('descuento.edit',['descuento'=>$descuento],['descuentos'=>$descuentos]);
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
        $descuento=Descuento::findOrFail($id);
        $descuento->descripcion= $request->input('descripcion');
        $descuento->porcentajeDescuento= $request->input('descuento');
        $descuento->save();

        return redirect()->route('descuento.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $descuento = Descuento::findOrFail($id);
        $descuento->delete();
        return redirect()->route('descuento.create');
    }
    private function addCountVisit(){
        Auth::user()->countPage(7);
    }
}

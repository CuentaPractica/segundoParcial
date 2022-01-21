<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Http\Requests\PersonaRequest;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=Persona::where('tipo','C')->Paginate(7);
        return view('cliente.index',['clientes'=>$clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonaRequest $request)
    {
        $cliente= new Persona();
        $cliente->nombre= $request->input('nombre');
        $cliente->apellidos= $request->input('apellidos');
        $cliente->CI= $request->input('CI');
        $cliente->telefono= $request->input('telefono');
        $cliente->tipo= 'C';
        $cliente->save();

        return redirect()->route('cliente.index');
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
        $cliente=Persona::findOrFail($id);
        return view('cliente.edit',['cliente'=>$cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonaRequest $request, $id)
    {
        $cliente= Persona::findOrFail($id);
        $cliente->nombre= $request->input('nombre');
        $cliente->apellidos= $request->input('apellidos');
        $cliente->CI= $request->input('CI');
        $cliente->telefono= $request->input('telefono');
        $cliente->save();

        return redirect()->route('cliente.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Persona::findOrFail($id);
        $cliente->delete();
        return redirect()->route('cliente.index');
    }

    public function buscar(Request $request)
    {
        $tipo = $request->input('tipo');
        $dato = $request->input('buscar');
        if($tipo==1){
            $clientes=Persona::where('tipo','C')->where('CI','like',"%$dato%")->Paginate(7);
        }
        if($tipo==2){
            $clientes=Persona::where('tipo','C')->where('apellidos','like',"%$dato%")->Paginate(7);
        } 
        return view('cliente.index',['clientes'=>$clientes]); 
    }
}

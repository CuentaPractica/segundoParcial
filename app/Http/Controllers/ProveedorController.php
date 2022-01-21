<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Http\Requests\PersonaRequest;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores=Persona::where('tipo','P')->Paginate(7);
        return view('proveedor.index',['proveedores'=>$proveedores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonaRequest $request)
    {
        $proveedor= new Persona();
        $proveedor->nombre= $request->input('nombre');
        $proveedor->apellidos= $request->input('apellidos');
        $proveedor->CI= $request->input('CI');
        $proveedor->telefono= $request->input('telefono');
        $proveedor->empresa= $request->input('empresa');
        $proveedor->direccion= $request->input('direccion');
        $proveedor->tipo= 'P';
        $proveedor->save();

        return redirect()->route('proveedor.index');
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
        $proveedor=Persona::findOrFail($id);
        return view('proveedor.edit',['proveedor'=>$proveedor]);
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
        $proveedor= Persona::findOrFail($id);
        $proveedor->nombre= $request->input('nombre');
        $proveedor->apellidos= $request->input('apellidos');
        $proveedor->CI= $request->input('CI');
        $proveedor->telefono= $request->input('telefono');
        $proveedor->empresa= $request->input('empresa');
        $proveedor->direccion= $request->input('direccion');
        $proveedor->save();

        return redirect()->route('proveedor.index');

    }

    public function buscar(Request $request)
    {
        $tipo = $request->input('tipo');
        $dato = $request->input('buscar');
        if($tipo==1){
            $proveedores=Persona::where('tipo','P')->where('CI','like',"%$dato%")->Paginate(7);
        }
        if($tipo==2){
            $proveedores=Persona::where('tipo','P')->where('apellidos','like',"%$dato%")->Paginate(7);
        } 
        return view('proveedor.index',['proveedores'=>$proveedores]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor = Persona::findOrFail($id);
        $proveedor->delete();
        return redirect()->route('proveedor.index');
    }
}

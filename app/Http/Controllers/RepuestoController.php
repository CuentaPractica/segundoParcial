<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repuesto;
use App\Models\Marca;
use App\Models\Categoria;
use Auth;

class RepuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->addCountVisit();
        $repuestos = Repuesto::Paginate(7);
        return view('repuesto.index',['repuestos'=>$repuestos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->addCountVisit();
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view('repuesto.create',['marcas'=>$marcas,'categorias'=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $repuesto = new Repuesto();
        $repuesto->nombre= $request->input('nombre');
        $repuesto->modelo= $request->input('modelo');
        $repuesto->idMarca= $request->input('marca');
        $repuesto->precio= $request->input('precio');
        $repuesto->idCategoria= $request->input('categoria');
        $repuesto->save();
        return redirect()->route('repuesto.index');
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
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $repuesto=Repuesto::findOrFail($id);
        return view('repuesto.edit',['repuesto'=>$repuesto],['marcas'=>$marcas,'categorias'=>$categorias]);
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
        $repuesto = Repuesto::findOrFail($id);
        $repuesto->nombre= $request->input('nombre');
        $repuesto->modelo= $request->input('modelo');
        $repuesto->idMarca= $request->input('marca');
        $repuesto->precio= $request->input('precio');
        $repuesto->stock= $request->input('stock');
        $repuesto->idCategoria= $request->input('categoria');
        $repuesto->save();
        return redirect()->route('repuesto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $repuesto = Repuesto::findOrFail($id);
        $repuesto->delete();
        return redirect()->route('repuesto.index');
    }
    private function addCountVisit(){
        Auth::user()->countPage(1);
    }
}

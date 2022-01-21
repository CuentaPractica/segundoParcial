<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
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
        $marcas=Marca::Paginate(4);
        return view('marca.create',['marcas'=>$marcas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $marca= new Marca();
        $marca->nombre= $request->input('nombre');
        $marca->save();
        return redirect()->route('marca.create');
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
        $marcas=Marca::Paginate(4);
        $marca=Marca::findOrFail($id);
        return view('marca.edit',['marca'=>$marca],['marcas'=>$marcas]);
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
        $marca=Marca::findOrFail($id);
        $marca->nombre= $request->input('nombre');
        $marca->save();

        return redirect()->route('marca.create');
    }

 /*   public function buscar(Request $request)
    {
        $nombre=$request->input('nombre');
        $categoria=Categoria::where('nombre','like',"$nombre%")->get();
        return view('categoria.index',['categorias'=>$categoria]);
    }
*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca = Marca::findOrFail($id);
        $marca->delete();
        return redirect()->route('marca.create');;
    }
}

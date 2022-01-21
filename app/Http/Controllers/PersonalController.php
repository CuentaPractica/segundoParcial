<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\PersonalController;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personal=Persona::where('tipo','E')->orWhere('tipo','A')->Paginate(7);
        return view('personal.index',['personal'=>$personal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $personal= new Persona();
        $personal->nombre= $request->input('nombre');
        $personal->apellidos= $request->input('apellidos');
        $personal->CI= $request->input('CI');
        $personal->telefono= $request->input('telefono');
        $personal->direccion= $request->input('direccion');
        $personal->tipo= $request->input('tipo');
        $personal->save();

        $user=new User();
        $user->email=$request->input('email');
        $user->password=bcrypt($request->input('password'));
        $user->idPersona=$personal->id;
        $user->save();

        return redirect()->route('personal.index');
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
        $personal=Persona::findOrFail($id);
        return view('personal.edit',['personal'=>$personal]);
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
        $personal= Persona::findOrFail($id);
        $personal->nombre= $request->input('nombre');
        $personal->apellidos= $request->input('apellidos');
        $personal->CI= $request->input('CI');
        $personal->telefono= $request->input('telefono');
        $personal->direccion= $request->input('direccion');
        $personal->tipo= $request->input('tipo');
        $personal->save();

       $user=$personal->users;
       $this->validate($request, [
        'email' => 'email|unique:users,email,'.$user->id
       ]);
       $user->email=$request->input('email');
       $user->password=bcrypt($request->input('password'));
       $user->save();

        return redirect()->route('personal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $personal = Persona::findOrFail($id);
        $personal->delete();
        return redirect()->route('personal.index');
    }
}

@extends('diseño.contenido')
@section('contenido')
<div id="borde"></div>
<div id="cuadro">
  <nav class="titulo"><h3>MODIFICAR CLIENTE</h3></nav>
  <form action="{{ route('cliente.update',[$cliente->id]) }}" method="post" >
  @csrf
  @method('put')
  <div class="form-row">

    <div class="col-md-4 mb-3">
      <label for="nombre">Nombre</label>
      <input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre" value="{{$cliente->nombre}}" required>
      @error('nombre')
             <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="apellidos">Apellidos</label>
      <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="apellidos" value="{{$cliente->apellidos}}" required>
      @error('apellidos')
             <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="CI">Carnet Identidad</label>
        <input type="number" name="CI" value="{{$cliente->CI}}" class="form-control" id="CI" placeholder="carnet identidad" aria-describedby="inputGroupPrepend" required>
    </div>

    <div class="col-md-4 mb-3">
      <label for="telefono">Telefono</label>
        <input type="number" name="telefono" value="{{$cliente->telefono}}" class="form-control" id="telefono" placeholder="telefono" aria-describedby="inputGroupPrepend" required>
    </div>
</div>
  <button class="btn btn-primary" type="submit">Modificar</button>
</form>
</div>
<div id="borde"></div>
<footer class="page-footer font-small blue pt-4">
<div class="alert alert-dark" role="alert">{{Auth()->user()->showCounter(2)}}</div>
</footer>
@endsection